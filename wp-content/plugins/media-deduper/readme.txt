=== Media Deduper ===
Contributors: drywallbmb, kenjigarland
Tags: media, attachments, admin, upload
Requires at least: 4.3
Tested up to: 4.8
Stable tag: 1.4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Save disk space and bring some order to the chaos of your media library by removing and preventing duplicate files.

== Description ==
Media Deduper will find and eliminate duplicate images and attachments from your WordPress media library. After installing, you'll have a new "Manage Duplicates" option in your Media section.

Before Media Deduper can identify duplicate assets, it will build an index of all the files in your media library, which can take some time. Once that's done, however, Media Deduper automatically adds new uploads to its index, so you shouldn't have to generate the index again.

**Need faster indexing? [Check out Media Deduper Pro](https://cornershopcreative.com/product/media-deduper/).**

Once up and running, Media Deduper provides two key tools:

1. A "Manage Duplicates" page listing all of your duplicate media files. The list makes it easy to see and delete duplicate files: delete one and its twin will disappear from the list because it's then no longer a duplicate. Easy! By default, the list is sorted by file size, so you can focus on deleting the files that will free up the most space.
2. A scan of media files as they're uploaded via the admin to prevent a duplicate from being added to your Media Library. Prevents new duplicates from being introduced, automagically!

Media Deduper comes with a "Smart Delete" option that prevents a post's Featured Image from being deleted, even if that image is found to be a duplicate elsewhere on the site.

If a post has a featured image that's a duplicate file, Smart Delete will re-assign that post's image to an already-in-use copy of the image before deleting the duplicate so that the post's appearance is unaffected. This feature only tracks Featured Images, and not images used in galleries, post bodies, shortcodes, meta fields, or anywhere else.

**Looking for more features? [Media Deduper Pro](https://cornershopcreative.com/product/media-deduper/) includes features for image fields from several popular plugins as well.**

Note that duplicate identification is based on the data of the files themselves, not any titles, captions or other metadata you may have provided in the WordPress admin.

As of version 1.1.0, Media Deduper can differentiate between 1.) media items that are duplicates because the media files they link to have the same data and 2.) those that actually point to the same data file, which can happen with a plugin like WP Job Manager or Duplicate Post.

As with any plugin that can perform destructive operations on your database and/or files, using Media Deduper can result in permanent data loss if you're not careful. **Back up your data before you try out Media Deduper! Please! We really don’t want you to destroy your stuff!**

**Need more support? [Media Deduper Pro](https://cornershopcreative.com/product/media-deduper/) includes dedicated support from Cornershop Creative.**

== Requirements ==
Media Deduper requires PHP 5.3 or later.

== Installation ==
1. Upload the `media-deduper` directory to your plugins directory (typically wp-content/plugins)
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Visit Media > Manage Duplicates to generate the duplicate index and see your duplicated files

== Frequently Asked Questions ==
= How are duplicates computed? =

Media Deduper looks at the original file uploaded to each attachment post and computes a unique hash (using md5) for that file. Those hashes are stored as postmeta information. Once a file's hash is computed it can be compared to other files' hashes to see if their data is an exact match.

= Why does the list of duplicates include all the copies of a duplicated file and not just the extra ones? =

Because there's no way of knowing which of the duplicates is the "real" or "best" one based on your preferred metadata, etc.

= Should I just select all duplicates and bulk delete permanently? =

NO! Because the list includes every copy of your duplicates, you'll likely always want to save one version, so *using Delete Permanently to delete all of them would be very, very bad.* Don't do that. You've been warned.

Instead, we recommend using the *Smart Delete* action (which is also found in the Bulk Actions menu). Smart Delete will delete the selected items one by one, and refuse to delete an item if it has no remaining duplicates. For example, if you have three copies of an image, and you select all three and choose Smart Delete, two copies will be deleted and the third will be skipped.

*Again, we strongly recommend backing up your data before performing any bulk delete operations, including Smart Delete.*

= Does Media Deduper prevent duplicates from all methods of import? =

At this time, Media Deduper only identifies and blocks duplicate media files manually uploaded via the admin dashboard -- it does not block duplicates that are imported via WP-CLI or the WordPress Importer plugin.

= Does this work with any plugins? =

The free version does not include plugin support. [Media Deduper Pro](https://cornershopcreative.com/product/media-deduper/) integrates with a number of popular plugins, including WooCommerce and Yoast SEO.

= How can I contribute? =

The git repository should be publicly available at https://bitbucket.org/cornershopcreative/plugin_media-deduper. Feel free to fork, edit, make pull requests, etc.


== Changelog ==
= 1.4.1 =
* Tweaks to messages about Pro: display on fewer pages, don't display to users who don't have permission to install new plugins, change wording slightly for clarity.

= 1.4.0 =
* "Delete Preserving Featured" has been renamed to "Smart Delete".
* Smart Delete logic has been changed so it will never delete the last copy of a media item. Previously, Delete Preserving Featured would _only_ save the last copy of a file if it or one of its duplicates was used as a featured image somewhere on the site.
* By default, the list of duplicates is now sorted by size (largest first), and secondarily by date (newest first).
* Media Deduper will now warn users before executing a Smart Delete operation, so you have a chance to cancel if you change your mind.
* We've added information about the newly released Media Deduper Pro.
* If your site is running PHP 5.2 or earlier, Media Deduper will now deactivate itself instead of causing errors.
* Bugfix: The second bulk action menu, at the bottom of the list of duplicates, was not behaving correctly under some circumstances. This has been fixed.
* Bugfix: Prior versions of Media Deduper could potentially have affected how other plugins' screen options were saved. This issue would only have affected plugins that did unusual things (e.g. data validation logic) on the `set-screen-option` hook, and we haven't run into this issue in the wild, but now it's fixed anyway.

= 1.3.2 =
* Bugfix: Fixing an issue that caused bulk actions (Delete Permanently, Delete Preserving Featured) to not work correctly on some versions of WordPress.
* When a media file is changed (using the built-in WP image editor or the Enable Media Replace plugin, for instance), the plugin will now re-check whether the updated file is a duplicate of another file in the media library.
* Minor code cleanup.

= 1.3.1 =
* Bugfix: Fixing an issue that caused attachments to be listed as "duplicates" even after all identical attachments had been deleted.

= 1.3 =
* Refactoring PHP to take advantage of WP 4.7's new hooks for handling bulk actions.
* Minor improvements to 'success' messages displayed after a bulk action has been performed on a set of duplicate attachments.
* When uninstalled, the plugin will now delete the 'mdd_size' meta field that it adds to attachments. Previously it would only delete the 'mdd_hash' field.
* Minor code cleanup.
* Bugfix: Fixing an issue that caused the columns on the Manage Duplicates screen (File, Author, etc.) to not actually be sortable.
* Bugfix: Ensuring that the 'size' column added to the main media library (in list view only) is styled properly & sortable.

= 1.2.2 =
* Bugfix: The bugfix in 1.2.1 introduced a problem with performing smart deletions, so it's been rewritten. Deduper and the normal Media Library should both work as expected now.

= 1.2.1 =
* Bugfix: Eliminating behavior where bulk-deleting media from the media library would redirect user to Deduper admin page after performing deletion.

= 1.2.0 =
* Adding sharing tools to help encourage spreading Media Deduper love!
* Refactoring CSS into standalone CSS file.
* Refactoring JS into standalone JS file.
* Bugfix: Altering notification message shown when indexing is manually aborted to indicate that indexing is not yet complete.

= 1.1.1 =
* Fixing a bug that would list all media as duplicates if all duplicates share a media file

= 1.1.0 =
* Implemented a check to differentiate posts that are duplicates because they actually share a single media file, and updated the UI to allow for controlling the display of these posts.
* Fixed a notice-level error for undefined $_GET variable

= 1.0.3 =
* Fixed a bug with "Are you sure you want to do this?" appearing due to overly-aggressive referrer checking

= 1.0.2 =
* Fixed a bug manifesting when bulk-deleting no items or running HHVM/PHP7

= 1.0.1 =
* Fixed a bug where Media Deduper didn't want to be uninstalled
* Fixed a bug where bulk deletion didn't always work
* Fixed a minor notice-level PHP error

= 1.0.0 =
* Implemented the 'Delete Preserving Featured' option to prevent inadvertently wiping out media assets in use as post thumbnails
* Enhanced indexing to include the file size
* Added a sortable 'filesize' column to the duplicates table that leverages the aforementioned size data
* Refined screen option to control number of media posts shown per page
* Included a new help tab to provide more information regarding the plugin, indexing, and deletion
* Various bugfixes, including one that broke bulk deletion

= 0.9.3 =
* Implementing Screen Options tab to control number of items displayed. This is a precursor to some other UI enhancements (hopefully).

= 0.9.2 =
* Misc cleanup

= 0.9.1 =
* Rewriting SQL query for finding duplicates to be massively more performant. Props to user gizmomol for the rewrite!

= 0.9 =
* Initial public release.
