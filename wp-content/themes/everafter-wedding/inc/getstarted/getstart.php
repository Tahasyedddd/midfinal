<?php
//about theme info
add_action( 'admin_menu', 'everafter_wedding_gettingstarted_page' );
function everafter_wedding_gettingstarted_page() {      
    add_theme_page( esc_html__('Everafter Wedding', 'everafter-wedding'), esc_html__('All About Everafter Wedding', 'everafter-wedding'), 'edit_theme_options', 'everafter_wedding_mainpage', 'everafter_wedding_mostrar_guide');   
}


function everafter_wedding_notice() {
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
        <div class="notice-content">
            <p><?php esc_html_e( 'Thanks For Choosing CA WP Themes', 'everafter-wedding' ); ?></p>
            <h2><?php esc_html_e( 'Thanks for installing Everafter Wedding Free Theme!', 'everafter-wedding' ) ?> </h2>
            <p><?php esc_html_e( "Please Click on the link below to Check The Full Theme Edit Documentation", 'everafter-wedding' ) ?></p>
            <div class="info-link">
                <a href="<?php echo esc_url( EVERAFTER_WEDDING_PRO_DOCUMENTATION ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'everafter-wedding' ); ?></a>
            </div>
            <h2><?php esc_html_e( 'Now the Premium Version is only at $39.99 with Lifetime Access!Grab the deal now!', 'everafter-wedding' ) ?> </h2>
            <h2><?php esc_html_e( 'Check The Pro Version: Everafter Wedding Premium for Amazing Features for Unlimited Site', 'everafter-wedding' ); ?></h2>
            <div class="info-link">
                <a href="<?php echo esc_url( EVERAFTER_WEDDING_PRO_URL ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'everafter-wedding' ); ?></a>
            </div>
            <div class="info-link">
                <a href="<?php echo esc_url( EVERAFTER_WEDDING_PRO_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Premium Demo', 'everafter-wedding' ); ?></a>
            </div>
        </div>
    </div>
    <?php }
}

add_action( 'admin_notices', 'everafter_wedding_notice' );





// Add a Custom CSS file to WP Admin Area
function everafter_wedding_admin_page_theme_style() {
   wp_enqueue_style('everafter-wedding-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstarted/getstarted.css');
   wp_enqueue_script('everafter-wedding-tabs', esc_url(get_template_directory_uri()) . '/inc/getstarted/tabs.js');
}
add_action('admin_enqueue_scripts', 'everafter_wedding_admin_page_theme_style');

//About Theme Info
function everafter_wedding_mostrar_guide() { 

    //custom function about theme customizer

    $return = add_query_arg( array()) ;
    $theme = wp_get_theme( 'everafter-wedding' );
?>

<div class="wrapper-info">
    <div class="col-left">
        <h2><?php esc_html_e( 'Welcome to Everafter Wedding Theme', 'everafter-wedding' ); ?> <span class="version">Version: 1.0</span></h2>
        <p><?php esc_html_e('CA WP Themes is a premium WordPress theme development company that provides high-quality themes for various types of websites. They specialize in creating themes for businesses, eCommerce, portfolios, blogs, and many more. Their themes are easy to use and customize, making them perfect for those who want to create a professional-looking website without any coding skills.','everafter-wedding'); ?></p>
        <p><?php esc_html_e('CA WP Themes offers a wide range of themes that are designed to be responsive and compatible with the latest versions of WordPress. Our themes are also SEO optimized, ensuring that your website will rank well on search engines. They come with a variety of features such as customizable widgets, social media integration, and custom page templates.','everafter-wedding'); ?></p>
        <p><?php esc_html_e('One of the unique things about CA WP Themes is their focus on providing excellent customer support. They have a dedicated team of support staff who are available 24/7 to help customers with any issues they may encounter. Their support team is knowledgeable and friendly, ensuring that customers receive the best possible experience.','everafter-wedding'); ?></p>
    </div>
    <div class="col-right">
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Buy Everafter Wedding Premium Theme','everafter-wedding'); ?></h4>
            <p><?php esc_html_e('Now the Premium Version is only at $39.99 with Lifetime Access!Grab the deal now!', 'everafter-wedding'); ?></p>
            <div class="info-link">
                <a href="<?php echo esc_url( EVERAFTER_WEDDING_PRO_URL ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'everafter-wedding' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Premium Theme Demo','everafter-wedding'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( EVERAFTER_WEDDING_PRO_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Demo', 'everafter-wedding' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Need Support? / Contact Us','everafter-wedding'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( EVERAFTER_WEDDING_PRO_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Contact Us', 'everafter-wedding' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Documentation','everafter-wedding'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( EVERAFTER_WEDDING_PRO_DOCUMENTATION ); ?>" target="_blank"> <?php esc_html_e( 'Docs', 'everafter-wedding' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Free Theme','everafter-wedding'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( EVERAFTER_WEDDING_FREE_URL ); ?>" target="_blank"> <?php esc_html_e( 'Demo', 'everafter-wedding' ); ?></a>
            </div>
        </div>

    </div>
</div>


<div class="new_box">
     <div class="featurebox">
        <h3><?php esc_html_e( 'Theme Information', 'everafter-wedding' ); ?></h3>
        <div class="table-image">
            <table class="tablebox">
                <thead>
                    <tr>
                        <th></th>
                        <th><?php esc_html_e('Free Themes', 'everafter-wedding'); ?></th>
                        <th><?php esc_html_e('Premium Themes', 'everafter-wedding'); ?></th>
                    </tr>   
                </thead>
                <tbody>
                    <tr>
                        <td><?php esc_html_e('Theme Edit Options', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Responsive Design', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Logo Upload', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Social Media Links', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Slider Settings', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('About Us Page', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Template Pages', 'everafter-wedding'); ?></td>
                        <td class="table-img"><?php esc_html_e('2', 'everafter-wedding'); ?></td>
                        <td class="table-img"><?php esc_html_e('5', 'everafter-wedding'); ?></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Home Page Template', 'everafter-wedding'); ?></td>
                        <td class="table-img"><?php esc_html_e('1', 'everafter-wedding'); ?></td>
                        <td class="table-img"><?php esc_html_e('1', 'everafter-wedding'); ?></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Home Page sections', 'everafter-wedding'); ?></td>
                        <td class="table-img"><?php esc_html_e('2', 'everafter-wedding'); ?></td>
                        <td class="table-img"><?php esc_html_e('10 to 15', 'everafter-wedding'); ?></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Contact us Page Template', 'everafter-wedding'); ?></td>
                        <td class="table-img">0</td>
                        <td class="table-img"><?php esc_html_e('1', 'everafter-wedding'); ?></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Blog Templates & Layout', 'everafter-wedding'); ?></td>
                        <td class="table-img">0</td>
                        <td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'everafter-wedding'); ?></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Page Templates & Layout', 'everafter-wedding'); ?></td>
                        <td class="table-img">0</td>
                        <td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'everafter-wedding'); ?></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Global Color Option', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Inbuild Demo Content', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Full Documentation', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Latest WordPress Compatibility', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Woo-Commerce Compatibility', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Support 3rd Party Plugins', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Secure and Optimized Code', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Exclusive Functionalities', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Section Enable / Disable', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Gallery', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Support to Provide Additional Required Custom CSS / JS', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Shortcodes', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Premium Membership', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Budget Friendly Value', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('Priority Error Fixing', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Custom Feature Addition', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr class="odd">
                        <td><?php esc_html_e('All Access Theme Pass', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Seamless Customer Support', 'everafter-wedding'); ?></td>
                        <td class="table-img"><span class="dashicons dashicons-no"></span></td>
                        <td class="table-img"><span class="dashicons dashicons-saved"></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="table-img"></td>
                        <td class="update-link"><a href="<?php echo esc_url( EVERAFTER_WEDDING_PRO_URL ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'everafter-wedding'); ?></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>    
</div>
<?php } ?>