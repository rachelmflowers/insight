/**
 * Initialize on load
 */
jQuery(document).ready(function() {

	MDD_Help( jQuery );
	MDD_Sharing( jQuery );
	MDD_SmartDeleteWarning( jQuery );

	if ( typeof mdd_config === 'object' ) {
		MDD_Indexer( jQuery );
	}
});


/**
 * Help screens
 */
function MDD_Help( $ ) {
	$('#shared-help').on('click', function() {
		// toggle help
		if ( $('#contextual-help-link').hasClass('screen-meta-active') ) {
			if ( $('#tab-link-shared').hasClass('active') ) {
				$('#contextual-help-link').trigger('click');
			} else {
				$('#tab-link-shared a').trigger('click');
			}
		} else {
			$('#contextual-help-link').trigger('click');
			$('#tab-link-shared a').trigger('click');
		}
	});
}


/**
 * Sharing tools
 */
function MDD_Sharing( $ ) {

	var sharer = {
		// Initialize the singleton
		init: function() {
			this.buttons = $('.share a');
			if ( this.buttons.length == 0 ) {
				// Abort if no buttons
				return;
			}

			this.buttons.on( 'click', $.proxy( this, 'onClick' ) );
		},

		// Get the url, title, and description of the page
		// Cache the data after the first get
		getPageData: function( e ) {
			if ( !this._data ) {
				this._data = {};
				this._data.title       = "I've found Media Deduper to be a useful plugin for managing my #WordPress Media Library -- check it out!";
				this._data.url         = "https://wordpress.org/plugins-wp/media-deduper/";
				this._data.description = "Media Deduper is a great WordPress plugin to help you find and eliminate duplicate images and attachments from your media library.";
				this._data.target = e;
			}
			return this._data;
		},

		// Event handler for the share buttons
		onClick: function( event ) {
			var service = $(event.target).data('service');
			if ( this[ 'do_' + service ] ) {
				this[ 'do_' + service ]( this.getPageData( event.target ) );
			}
			return false;
		},

		// Handle the Twitter service
		do_twitter: function( data ) {
			var url = 'https://twitter.com/intent/tweet?' + $.param({
				original_referer: document.title,
				text: $(data.target).data('tweet') || data.title,
				url: data.url
			});
			if ( $('.en_social_buttons .en_twitter a').length ) {
				url = $.trim( $('.en_social_buttons .en_twitter a').attr('href') );
			}
			this.popup({
				url: url,
				name: 'twitter_share'
			});
		},

		// Handle the Facebook service
		do_facebook: function( data ) {
			var url = 'https://www.facebook.com/sharer/sharer.php?' + $.param({
				u: data.url
			});
			if ( $('.en_social_buttons .en_facebook a').length ) {
				url = $.trim( $('.en_social_buttons .en_facebook a').attr('href') );
			}
			this.popup({
				url: url,
				name: 'facebook_share'
			});
		},

		// Handle the email service
		do_email: function( data ) {
			var url = 'mailto:?subject=' + data.title + '&body=' + data.description + ": \n" + data.url;
			window.location.href = url.replace('/\+/g',' ');
		},

		// Handle Tumblr
		do_tumblr: function ( data ) {
			var url = 'https://www.tumblr.com/widgets/share/tool?' + $.param({
				canonicalUrl: data.url,
				title: data.title,
				caption: data.caption,
				posttype: 'link'
			});
			this.popup({
				url: url,
				name: 'tumblr_share'
			});
		},

		// Handle the Google+ service
		do_googleplus: function( data ) {
			var url = 'https://plus.google.com/share?' + $.param({
				url: data.url
			});
			this.popup({
				url: url,
				name: 'googleplus_share'
			});
		},

		do_gplus: function ( data ) {
			this.do_googleplus( data );
		},

		// Handle the LinkedIn service
		do_linkedin: function( data ) {
			var url = 'http://www.linkedin.com/shareArticle?' + $.param({
				mini: 'true',
				url: data.url,
				title: data.title,
				summary: data.description
				// source: data.siteName
			});
			this.popup({
				url: url,
				name: 'linkedin_share'
			});
		},

		// Create and open a popup
		popup: function( data ) {
			if ( !data.url ) {
				return;
			}

			$.extend( data, {
				name: '_blank',
				height: 600,
				width: 845,
				menubar: 'no',
				status: 'no',
				toolbar: 'no',
				resizable: 'yes',
				left: Math.floor(screen.width/2 - 845/2),
				top: Math.floor(screen.height/2 - 600/2)
			});

			var specNames = 'height width menubar status toolbar resizable left top'.split( ' ' );
			var specs = [];
			for( var i=0; i<specNames.length; ++i ) {
				specs.push( specNames[i] + '=' + data[specNames[i]] );
			}
			return window.open( data.url, data.name, specs.join(',') );
		}
	};

	sharer.init();
}


/**
 * Show a warning when the user attempts to smartdelete attachment(s).
 */
function MDD_SmartDeleteWarning( $ ) {
	// Analogous to wp-admin/js/media.js, line 100 as of WP 4.7.5.
	$( '#doaction, #doaction2' ).click( function( event ) {
		$( 'select[name^="action"]' ).each( function() {
			var optionValue = $( this ).val();

			if ( 'smartdelete' === optionValue ) {
				if ( ! window.confirm( mdd_l10n.warning_delete ) ) {
					event.preventDefault();
				}
			}
		});
	});
}


/**
 * Indexer handler
 */
function MDD_Indexer( $ ) {
	var i,
		mdd_ids     = mdd_config.id_list,
		mdd_total   = mdd_ids.length,
		mdd_count   = 1,
		mdd_percent = 0,
		mdd_good    = 0,
		mdd_bad     = 0,
		mdd_failed_ids = [],
		mdd_active  = true;

	// Initialize progressbar.
	$("#mdd-bar-percent").html( "0%" );

	// Listen for abort.
	$("#mdd-stop").on('click', function() {
		mdd_active = false;
		mdd_bad = 'aborted';
		$(this).val( mdd_l10n.stopping );
	});

	// Listen for manage.
	$("#mdd-manage").on('click', function() {
		window.location = mdd_config.media_url;
	});

	// Called after each resize. Updates debug information and the progress bar.
	function mdd_increment( id, success, response ) {
		mdd_percent = mdd_count / mdd_total;
		$("#mdd-bar-percent").html( (mdd_percent * 100).toFixed(1) + "%" );
		$("#mdd-meter").css( 'width', (mdd_percent * 100) + "%" );
		mdd_count++;

		if ( success ) {
			mdd_good++;
		} else {
			mdd_bad++;
			mdd_failed_ids.push( id );
		}
	}

	// Called when all images have been processed. Shows the results and cleans up.
	function mdd_results() {

		$('#mdd-stop').hide();
		$('#mdd-manage').show();

		// @todo: i18n of these strings.
		if ( mdd_bad === 'aborted' ) {
			$("#message").html( mdd_l10n.index_complete.aborted );
		} else if ( mdd_bad > 0 ) {
			$("#message").html( mdd_l10n.index_complete.issues.replace('{NUM}', mdd_bad) );
		} else {
			$("#message").html( mdd_l10n.index_complete.perfect );
		}

		$("#message").show();
	}

	// Index an attachment image via AJAX.
	function index_media( id ) {

		request = $.post( ajaxurl, { action: "calc_media_hash", id: id }, function( response ) {
			if ( typeof response !== 'object' || ( typeof response.success === "undefined" && typeof response.error === "undefined" ) ) {
				response = {
					success: false,
					error: mdd_l10n.ajax_fail
				};
			} else if ( typeof response === 'object' && typeof response.data.error !== 'undefined' ) {
				$('.error-files').append('<li>' + response.data.error + '</li>');
			}

			mdd_increment( id, response.success, response );

			if ( mdd_ids.length && mdd_active ) {
				index_media( mdd_ids.shift() );
			} else {
				mdd_results();
			}
		})

		.fail( function( response ) {
			mdd_increment( id, false, response );

			if ( mdd_ids.length && mdd_active ) {
				index_media( mdd_ids.shift() );
			} else {
				mdd_results();
			}
		});
	}

	index_media( mdd_ids.shift() );
}
