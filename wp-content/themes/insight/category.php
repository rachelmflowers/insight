<?php
// Text content per audience
if ( is_category( '10' ) ) {
    $welcome_text = "to your benefits";
    $c2a = "Looking for forms?";
    $c2a_button = "Visit our forms library";
    $c2a_link = "";
} elseif ( is_category( '11' ) ) {
    $welcome_text = "for employers";
    $c2a = "Ready to begin?";
    $c2a_button = "Request a proposal";
    $c2a_link = "";
} elseif ( is_category( '12' ) ) {
    $welcome_text = "for agents";
    $c2a = "Ready to begin?";
    $c2a_button = "Request a proposal";
    $c2a_link = "";
} elseif ( is_category( '13' ) ) {
    $welcome_text = "for providers";
    $c2a = "Ready to begin?";
    $c2a_button = "something???";
    $c2a_link = "";
}
$category = "";
$categories = get_the_category();

if ($categories) {
    $category = strtolower($categories[0]->name);
}    
?>

<?php

if ( !is_user_logged_in() && (um_user('role') != 'admin') ) {
    ?>
    <div class="overlay">
        <div class="login-box">
            <h2><?=single_cat_title();?> Login</h2>
            <?=do_shortcode('[ultimatemember form_id=418]');?>

            <?=do_shortcode('[ultimatemember form_id=417]');?>
            <a href="#" onclick="toggleLogin(); toggleRegistration(this);">New User</a> <a href="">User Help</a>
        </div>
    </div>
    <?php
} elseif (is_user_logged_in() && (um_user('role') != $category) && (um_user('role') != 'admin')) {
    ?>
    <div class="overlay">
        <div class="login-box">
            <h2><?=single_cat_title();?> Login</h2>
                
            <div class="alert alert-warning">You do not have permission to view this section.</div>

            <?=do_shortcode('[ultimatemember form_id=417]');?>
            <a href="#" onclick="toggleRegistration(this);">New User</a> <a href="/logout">Logout</a> <a href="">User Help</a>
        </div>
    </div>
    <?php
}
?>
<section class="main-content">
    <div class="welcome">
        <h1>Welcome.</h1>
        <h3>Insight's self service portal <br /> <?= $welcome_text ?>.</h3>
        <p>Our 24/7 secure access to all of your information.
        <svg version="1.1" id="snowflake" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="444.5px" height="451.2px" viewBox="0 0 444.5 451.2" style="enable-background:new 0 0 444.5 451.2;" xml:space="preserve"
	>
        <path style="fill:#FFFFFF;" d="M204,422.3c0-10.2,8.2-18.5,18.2-18.5c10.1,0,18.3,8.3,18.3,18.5c0,10.2-8.2,18.5-18.3,18.5
        C212.2,440.9,204,432.6,204,422.3 M172.3,225.6c0-28,22.4-50.8,50-50.8c27.6,0,50,22.8,50,50.8c0,28-22.4,50.7-50,50.7
        C194.7,276.3,172.3,253.6,172.3,225.6 M98.1,377.8c-3.4,3.5-8,5.4-12.9,5.4c-4.9,0-9.5-1.9-12.9-5.4c-3.5-3.5-5.3-8.1-5.4-13.1
        c0-4.9,1.9-9.6,5.4-13.1c3.4-3.5,8-5.4,12.9-5.4c4.9,0,9.5,1.9,12.9,5.4c3.5,3.5,5.4,8.2,5.4,13.1
        C103.4,369.7,101.5,374.3,98.1,377.8 M28.4,244.1c-10.1,0-18.3-8.3-18.3-18.5c0-10.2,8.2-18.5,18.3-18.5c10.1,0,18.3,8.3,18.3,18.5
        C46.6,235.8,38.4,244.1,28.4,244.1 M72.3,99.5c-3.5-3.5-5.3-8.1-5.4-13.1c0-5,1.9-9.6,5.4-13.1c7.1-7.2,18.7-7.2,25.8,0
        c3.5,3.5,5.4,8.2,5.4,13.1c0,5-1.9,9.6-5.4,13.1c-3.4,3.5-8,5.4-12.9,5.4C80.3,105,75.7,103,72.3,99.5 M341.1,86.4
        c0-5,1.9-9.6,5.3-13.1c7.1-7.2,18.7-7.2,25.8,0c3.4,3.5,5.4,8.2,5.4,13.1c0,5-1.9,9.6-5.4,13.1c-3.4,3.5-8,5.4-12.9,5.4
        c-4.9,0-9.5-1.9-12.9-5.4C343,96,341.1,91.4,341.1,86.4 M416.2,207.1c10.1,0,18.3,8.3,18.3,18.5c0,10.2-8.2,18.5-18.3,18.5
        c-10.1,0-18.3-8.3-18.3-18.5C397.9,215.4,406.1,207.1,416.2,207.1 M372.3,351.6c3.4,3.5,5.4,8.2,5.4,13.1c0,4.9-1.9,9.6-5.4,13.1
        c-3.4,3.5-8,5.4-12.9,5.4c-4.9,0-9.5-1.9-12.9-5.4c-3.4-3.5-5.3-8.1-5.3-13.1c0-4.9,1.9-9.6,5.3-13.1c3.4-3.5,8-5.4,12.9-5.4
        C364.2,346.2,368.8,348.1,372.3,351.6 M204,28.8c0-10.2,8.2-18.5,18.2-18.5c10.1,0,18.3,8.3,18.3,18.5c0,10.2-8.2,18.5-18.3,18.5
        C212.2,47.3,204,39,204,28.8 M250.7,422.3c0-14.1-10.1-25.9-23.3-28.3V286.4c12.8-1.1,24.4-6.2,33.7-14.2l75,76.1
        c-3.3,4.8-5.1,10.5-5.1,16.4c0,7.7,2.9,14.9,8.3,20.4c5.4,5.4,12.5,8.5,20.1,8.5c7.6,0,14.7-3,20.1-8.5c5.4-5.4,8.3-12.7,8.3-20.4
        c0-7.7-2.9-14.9-8.3-20.4c-5.3-5.4-12.5-8.4-20.1-8.4c-5.9,0-11.5,1.8-16.2,5.1l-75-76.1c7.8-9.4,12.9-21.2,14-34.2h106.1
        c2.4,13.4,14,23.7,27.9,23.7c15.6,0,28.4-12.9,28.4-28.8c0-15.9-12.7-28.8-28.4-28.8c-13.9,0-25.5,10.2-27.9,23.7H282.2
        c-1.1-13-6.2-24.8-14-34.2l75-76.1c4.7,3.3,10.3,5.1,16.2,5.1c7.6,0,14.7-3,20.1-8.4c5.4-5.4,8.3-12.7,8.3-20.4
        c0-7.7-2.9-14.9-8.3-20.4c-11.1-11.2-29.1-11.2-40.1,0c-5.4,5.4-8.3,12.7-8.3,20.4c0,6,1.8,11.6,5.1,16.4L261,179
        c-9.3-7.9-20.9-13.1-33.7-14.2V57.1c13.2-2.4,23.3-14.2,23.3-28.3c0-15.9-12.7-28.8-28.4-28.8c-15.7,0-28.4,12.9-28.4,28.8
        c0,14.1,10.1,25.9,23.3,28.3v107.6c-12.8,1.1-24.4,6.3-33.7,14.2l-75-76.1c3.3-4.8,5.1-10.5,5.1-16.4c0-7.7-3-14.9-8.3-20.4
        c-11.1-11.2-29.1-11.2-40.1,0c-5.4,5.4-8.3,12.7-8.3,20.4c0,7.7,2.9,14.9,8.3,20.4c5.4,5.4,12.5,8.4,20.1,8.4
        c5.9,0,11.5-1.8,16.2-5.1l75,76.1c-7.8,9.4-12.9,21.2-14,34.2H56.3c-2.4-13.4-14-23.7-27.9-23.7C12.7,196.8,0,209.7,0,225.6
        c0,15.9,12.7,28.8,28.4,28.8c13.9,0,25.5-10.2,27.9-23.7h106.1c1.1,13,6.2,24.8,14,34.2l-75,76.1c-4.7-3.3-10.3-5.1-16.2-5.1
        c-7.6,0-14.7,3-20.1,8.4c-5.4,5.4-8.3,12.7-8.3,20.4c0,7.7,2.9,14.9,8.3,20.4c5.4,5.4,12.5,8.5,20.1,8.5c7.6,0,14.7-3,20.1-8.5
        c5.4-5.4,8.3-12.7,8.3-20.4c0-6-1.8-11.6-5.1-16.4l75-76.1c9.3,8,20.9,13.1,33.7,14.2V394c-13.2,2.4-23.3,14.2-23.3,28.3
        c0,15.9,12.7,28.8,28.4,28.8C237.9,451.2,250.7,438.2,250.7,422.3"/>
    </svg>
    </div>
    <aside>
        <div class="info">
            <p>As an employee of an Insight client, you have 24/7 secure access to all of your benefit information right at your fingertips!</p>
            <p>Use the navigation bar above for claims submission, address changes, flex, HRA and HSA reimbursement, appeals, your claims history and balances, enrollment, and more.</p>
        </div>
        <div class="call-to-action">
            <h3><?= $c2a ?></h3>
            <a class="btn btn-dark" href="<?= $c2a_link ?>"><?= $c2a_button ?></a>
        </div>
    </aside>
</section>

<div class="page-footer">
    <?php dynamic_sidebar('chat-message'); ?>
    <?php dynamic_sidebar('audience-contact'); ?>
</div>

<script type="text/javascript">
    function toggleLogin() {
        jQuery('.um-login').fadeToggle();
    };

    function toggleRegistration(e) {
        jQuery('.um-register').fadeToggle();
        $text = jQuery(e).text();
        $toggleText = $text == 'New User' ? 'Login' : 'New User';
        jQuery(e).text($toggleText);
    };
</script>
