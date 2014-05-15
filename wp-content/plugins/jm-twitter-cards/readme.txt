=== JM Twitter Cards ===
Contributors: jmlapam
Tags: twitter, cards, semantic markup, metabox, meta, photo, product, gallery, player
Donate Link: http://www.amazon.fr/registry/wishlist/1J90JNIHBBXL8
Tested up to: 3.9.1
License: GPLv2 or later
Stable tag: trunk
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easy integration of Twitter cards in WordPress. All card types provided.

== Description ==

Once activated the plugin adds appropriate meta on your WordPress website allowing you to get Twitter cards for your posts according to your settings. Enjoy !

Compatible with : WP SEO by Yoast and All in One SEO.

The plugin allows you to customize your cards per each post. If you use SEO by Yoast plugin do not activate the Twitter card's option. Otherwise markup will be added twice.
If you choose full customization you will see a metabox in your post edit.

**Please help me to translate it in other languages** : contact@tweetpress.fr

Plugin available in Spanish thanks to Andrew de <a href="http://www.webhostinghub.com/">WebHostingHub</a>  (thanks dude ^^) 

I've been rebuilding the plugin for better features and user interface. This is available here : https://github.com/TweetPressFr/jm-twitter-cards

This URL is the place where I improve the plugin according to support requests and stuffs like this. Github is the place !


<a href="http://twitter.com/intent/user?screen_name=tweetpressfr">Follow me on Twitter</a>


––––
En Français 
–––––––––––––––––––––––––––––––––––

Une fois activé le plugin s'occupe d'ajouter les métas nécessaires vous permettant d'obtenir des cards Twitter sur vos posts selon vos réglages. Profitez-en bien !

Compatible avec WP SEO by Yoast et All in One SEO.

Le plugin vous permet de personnaliser les cards pour chaque post. Attention malgré tout à ne pas activer l'option card de Yoast ou sinon le markup sera ajouté 2 fois.
En mode full custom une metabox apparaît dans vos edit de post.

Appel aux traducteurs pour d'autres langages : contact@tweetpress.fr

<a href="http://twitter.com/intent/user?screen_name=tweetpressfr">Me suivre sur Twitter</a>


== Installation ==

1. Upload plugin files to the /wp-content/plugins/ directory
2. Activate the plugin through the Plugins menu in WordPress
3. Then go to settings > JM Twitter Cards to configure the plugin
4. To display the metabox in edit section (posts, pages, attachments), enable option in section called **Custom Twitter Cards**


[youtube http://www.youtube.com/watch?v=8l4k3zrD4Z0]


––––
En Français 
–––––––––––––––––––––––––––––––––––

1. Chargez les fichiers de l'archive dans le dossier /wp-content/plugins/ 
2. Activez le plugin dans le menu extensions de WordPress
3. Allez dans réglages > JM Twitter Cards pour configurer le plugin
4. Pour afficher la metabox dans vos admin de posts, de pages et de médias, activez l'option correspondante dans **Custom Twitter Cards**

== Frequently asked questions ==

= I got problem with Instagram = 
It's a known issue due to Instagram. Twitter said it recently : Users are experiencing issues with viewing Instagram photos on Twitter. Issues include cropped images.This is due to Instagram disabling its Twitter cards integration, and as a result, photos are being displayed using a pre-cards experience. 
So, when users click on Tweets with an Instagram link, photos appear cropped.*

= Plugin is fine but Twitter cards doesn't appear in my tweets =
1. Make sure you correctly fulfilled fields in option page according to <a href="https://dev.twitter.com/docs/cards" title="Twitter cards documentation">Twitter documentation</a>
2. Make sure you have correctly <a href="https://dev.twitter.com/docs/cards/validation/validator" title="Twitter cards submit">submitted your website to Twitter</a>
3. Wait for Twitter's answer (a mail that tells you your site has been approved)
4. Be careful with your robots.txt and put some rules to allow Twitter to fetch your website :
`User-agent: Twitterbot
    Disallow:`
If it still doesn't work please open a thread on support or at this URL: <a href="http://tweetpress.fr/en/plugin/new-plugin-jm-twitter-cards/">TweetPress, JM Twitter Cards</a>

= Use of new feature product cards = 
Just activate meta box, select **card type product** and save draft. 4 new fields will appear and you'll be able to set your product card.

= The plugin generates a lot of images (different sizes) = 
I can be a problem when you work with HD and/or a lot of images.

= How do I use the custom fields option? = 
Basically you provide your custom field keys in plugin option page and then it will grab datas.

= How do I use gallery cards ? = 
Just use the WordPress media manager to set a WordPress Gallery and the plugin will grab the first 4 images to set the gallery card.
You have to use the shortcode [gallery] to enjoy this feature ( that's what the WordPress media manager does, it inserts the shortcode [gallery]).

**Please avoid using images heavier than 1 MB.**

= I get a fatal error ! = 
`Call to undefined function cmb_metabox_form()` >> if you get this it's not due to the plugin it comes from another plugin or a theme using the same framework for meta boxes but in a very old version.
So do not yell at me ^^


––––
En Français 
–––––––––––––––––––––––––––––––––––

= Problème avec Instagram = 
C'est un problème connu. Cela vient d'Instagram lui-même qui préfère que ses utilisateurs partagent les photos chez lui plutôt que sur Twitter. Instagram a supprimé ses Twitter Cards.

= Le plugin marche mais je n'obtiens pas de Twitter Cards dans mes tweets =
1. Assurez-vous bien d'avoir rempli correctement les champs dans la page d'options suivant <a href="https://dev.twitter.com/docs/cards" title="Twitter cards documentation">la documentation Twitter</a>
2. Assurez-vous bien d'avoir <a href="https://dev.twitter.com/docs/cards/validation/validator" title="Twitter cards formulaire de validation">soumis votre site à Twitter</a>
3. Attendez la réponse de Twitter (un mail qui vous indique que votre site a été approuvé)
4. Attention avec le fichier robots.txt, vous devez autoriser le robot de Twitter à crawler votre site:
`User-agent: Twitterbot
    Disallow:`
Si cela ne marche toujours pas SVP ouvrez un topic sur le support du plugin ou à cette adresse : <a href="http://tweetpress.fr/plugin/jm-twitter-cards">TweetPress, JM Twitter Cards</a>

= Utilisez la nouvelle card product = 
Activez la meta box et sélectionnez **le type product** pour la card. Sauvez le brouillon et 4 champs apparaîtront pour mettre en place la card product.

= Le plugin génère beaucoup trop de fichiers images = 
Cela peut poser problème si vous travaillez avec de la HD et/ou beaucoup d'images. Vous pouvez donc utiliser un plugin qui va effacer les fichiers images non utilisés.

= Comment utiliser l'option custom fields? = 
Il suffit de renseigner les clés de vos custom fields en page d'option et le plugin s'occupera de récupérer les datas correspondantes.

= Comment mettre en place des cards galerie ? = 
Utiliser le gestionnaire de médias WordPress pour créer une galerie WordPress et le plugin prendra les 4 premières pour constituer la card galerie.
Vous devez utiliser le shortcode [gallery] pour obtenir une card galerie (c'est ce que fait le gestionnaire de médias, il insère le shortcode [gallery]).

**SVP évitez d'utliser des images de plus d'1 MB**.

= Hey j'ai une fatal error ! = 
`Call to undefined function cmb_metabox_form()` >> ça vient d'un thème ou d'un plugin qui use du même framework pour ses meta boxes mais dans une version très ancienne, donc ne me criez pas dessus ^^


== Screenshots ==
1. admin
2. confirmation mail
3. meta box
4. player cards validator ( I did not apply for player cards cause I do not have SSL )
5. gallery cards validator


== Other notes ==


= 4.3 brings new filter for your convenience if you're a developer =
* `jm_tc_get_excerpt`
* `jm_tc_image_source`
* `jm_tc_card_type`

= Here is a snippet you can use with new filters =

** Get native excerpt, some themes use them **

`add_filter('jm_tc_get_excerpt','_jm_tc_modify_excerpt');
function _jm_tc_modify_excerpt() {
    global $post;
	return get_excerpt_from_far_far_away($post->ID);
}

function get_excerpt_from_far_far_away( $post_id )
{
	global $wpdb;
	$query = 'SELECT post_excerpt FROM '. $wpdb->posts .' WHERE ID = '. $post_id .' LIMIT 1';
	$result = $wpdb->get_results($query, ARRAY_A);
	$post_excerpt = $result[0]['post_excerpt'];
	return $post_excerpt;
}`

** Hack source image e.g if you use relative paths **
`add_filter('jm_tc_image_source', '_jm_tc_relative_paths');
function _jm_tc_relative_paths($content) {
	return trailingslashit( home_url() ).$content;
}`

**BE CAREFUL WITH THIS! DO NOT USE IF YOU DO NOT KNOW WHAT YOU ARE DOING, YOU CAN BREAK YOUR CARDS WITH THIS !!!**


== Changelog ==

= 5.2.2 =
* 11 May 2014
* Fix wrong post meta key for player stream
* Fix robots.txt function 
* Add tabs to admin pages (menu on top for better UX with admin nav)

= 5.2.1 =
* 07 May 2014
* Skip () for classes because we do not need it, actually no argument in constructor
* Removes notices, just uncheck option cards in WP SEO if enabled on plugins_loaded (soft way)
* Add app card type to meta box, add country field for meta country application not available on the US app store
* Add spanish translation for plugin & documentation so now full spanish version, huge thanks to Andrew Kurtis from WebHostingHub (http://www.webhostinghub.com/)

= 5.2.0 =
* 03 May 2014
* Add confirmation message for option page when settings are saved
* Add translation in Spanish for documentation
* Fix bug with capability name
* Add 2nd footage, a video for troubleshooting
* Re-add preview feature, use only PHP for this
* Fix bug with preview WP SEO
* Add 3rd footage : multi-author video tutorial
* Update framework cmb
* Fix the issue with strip_shortcodes() not working

= 5.1.9 =
* 21 Apr 2014
* Fix fallback All In One SEO title
* Put the card type selected in admin option page as default setting for meta box because it so a pain to select it on each post when meta box is enabled ^^
* Note that if you want to change card type for a particular post you'll need to use this select
* Everything that can be default is now set so even you do not have to set it if you do not want to
* Will save your time !
* Fix bug with get_post_meta and custom fields
* Fix escaping quotes and stuffs like this with WP SEO by Yoast desc and title
* Rebuild French Translation
* Add tutorial menu with videos explaining how to use the plugin

= 5.1.8 =
* 16 Apr 2014
* Fix bug with SEO plugins detection
* Fix bug with older versions of WorPress where wp_enqueue_media() does not exist (just not use it for those installations)
* Add src parameter to all meta image, this should make the Twitterbot treat the image as a unique URL and re-fetches the image
* Fix PHP 5.4++ issue with static method called non statistically

= 5.1.6 =
* 14 Apr 2014
* Fix PHP warning when calling static method
* Make it compatible with older versions of PHP
* it's a small fix and it can help users running PHP under 5.3 
* Fix super weird bug with PHP_INT_MAX and jetpack (jetpack menu was hidden)
* Some users reported errors on update and it was due to the fact they're using old versions of PHP under 5.3
* The fix can be done in the next update but I encourage you to migrate from PHP 5.2 to 5.3 in any case
* Improve User interface by splitting admin into pages : only important settings, the plugin does a lot of checking on its own
* Rebuild the entire code for maintenance
* Use now a robust framework for metaboxes, this allows some new features such as preview for images and less html markup in PHP files
* 2 metaboxes in post edit now, one for images and one for other markup
* Thanks a lot to the beta tester who have tested this new version and reported bugs and so helped me a lot with this new version

= 4.4.4 =
* 09 Apr 2014
* Improve function jm_tc_get_post_thumbnail_size() by removing unecessary get_posts()
* The following regards only users that use the default excerpt :
* REMOVE excerpt lenght setting : this could seem a little bit weird but in fact Twitter allows us to get 200 chars for meta desc. 
* It occurred to me that it's better not checking anything for excerpt length than cutting the desc like the plugin does in 4.4.2 & 4.4.3
* Some users reported that it cuts text in a ugly way
* Just remember it's 200 characters at most
* REMOVE temporarily preview feature in meta box cause it's full of bugs and you get sometimes false results if you compare edit screen and real life in source code of the webpage

= 4.4.3 =
* 08 Apr 2014
* fix stupid mistake in excerpt function with substr


= 4.4.2 =
* 06 Apr 2014
* Fix wrong approach for meta desc because it's not 200 words max but 200 characters !!!  https://dev.twitter.com/docs/cards/markup-reference
* Seems like we have to use PHP to limit excerpt by char, found no WP function for that and it's quite logical

= 4.4.1 =
* 30 Mar 2014
* re-add the strip_shortcodes() to get_excerpt_by_id() to avoid shortcode to appear in meta desc
* Add src extra parameter to meta image so that the Twitterbot treats the image as a unique URL and re-fetches the image
* There's now a 5.0 version on github, I've rebuild code so it's better organized by far and there some cool new features
* This is an alpha version so I'm not gonna update it on WordPress.org until I'm sure it's safe
* I'll probably keep 2 versions, one for wordpress.org and one for github, if you want to test it, fork it and whatever you want feel free to join me: https://github.com/TweetPressFr/jm-twitter-cards

= 4.4 =
* 17 Mar 2014
* replace far-fetched PHP in get_excerpt_by_id() function with a simple WP function called wp_trim_words() 
* bump the markup up according to this thread https://dev.twitter.com/discussions/17878
* Actually no big deal if your theme is clean but sometimes a lot of stuffs is added with the hook `wp_head`
* For details about installation please read the documentation, you can also check this link : https://dev.twitter.com/docs/cards/twitter-cards-for-cms-wordpress-blogger-tumblr#plugin_jm

= 4.3 =
* 09 Mar 2014
* Fix a typo that triggered notice with undefined var
* Provide filters a lot of new filters for developers see Other notes
* Fix unsaved values on attachment, actually wordpress got its own hook for saving values for meta box
* By default image source will be grabbed from the attached file URL because most of the time it's about images.
* If you need to set image for other mime types just use the meta box and set it with external URL section
* Add upload button for external URL section in meta box
* Add different hanles for scripts and styles in admin which is actually a better idea
* Put the entire code on github : https://github.com/TweetPressFr/jm-twitter-cards

= 4.2 =
* 04 Mar 2014
* Add preview in meta box for Twitter cards markup so you do not have to load the page and to view source code to check your config, 
* Please consider preview as a way to check markup and save draft to see the result
* Then click on the validator button (if your domain is still not approved) to submit your domain to dev.twitter.com 
* Add new card type "app" (if ou really need to use this card type set it from the option page and combine with app install & deep linking fields)
* Fix wrong type of input fields for deep linking in option page
* Fix wrong output for errors
* Add link to validator almost everywhere

= 4.1 =
* 18 Feb 2014
* Fix unwanted spaces in .pot and .php files for documentation
* Add appropriate functions for translation e.g __() instead of _e() where it's needed
* Translate the whole documentation into French

= 4.0 =
* 16 Feb 2014
* Improve home and post page settings
* Add app install and deep linking especially if you want to add some iPhone, iPad and Android IDs (apps)
* Add documentation as submenu
* Update translation files and add pot files
* Make documentation "translation-ready" (if you want to translate it, please keep the same name and add your language slug e.g `jm-tc-doc-es_ES.po`). 
* Documentation has its own translation file and text-domain. I think it's better than loading everything everywhere on the website.

= 3.9.1 =
* 13 Feb 2014
* Make warning message appear as HTML comments only for users that can publish posts (front-end)

= 3.9 =
* 08 Feb 2014
* Delete meta domain which is useless now
* Tidy code 
* Add support for player cards (Available only with meta box, please read the documentation, this is a tricky card type and approval is not automatic)
* Update documentation and fix wrong HTML in the file
* Update uninstall.php
* Update meta box and meta box js
* Update language files
* Fix hook for translation init for admin_init
* Fix double echo for gallery card meta

= 3.8.1 =
* 02 Feb 2014
* Fix jQuery in meta box => no more hide for additional fields when saving
* Fix conflicts between product and photo cards with meta width and height
* Update uninstall.php
* Sorry for the too many updates today. Bugdfixes have been made quickly ^^.

= 3.7 & 3.8 =
* 02 Feb 2014
* fix capability error

= 3.6 =
* 02 Feb 2014
* Bugfix : capability and role => add field in profile only if user can publish posts
* Add some icons in option page ^^

= 3.5.1 =
* 28 Jan 2014
* Change priority for Twitter cards Markup (put at the very end of wp_head() )
* Add some documentation for Analytics which is an amazing new feature (not available for some countries such as France, be patient ^^)
* Fix links to documentation
* Regenerate blank po file

= 3.5.0 =
* 15 Jan 2014
* fix notice on 404 and pages not concerned by the plugin (undefined var)
* fix links to documentation in option page
* fix missing translated strings 

=  3.4.0 =
* 04 Jan 2014
* Fix the missing closing meta for description that triggers minor HTML error
* Make card type in meta box the same as option page by default to save your time
* Quit paypal - if you want to thank me, just use the wishlist <3

=  3.3.9 =
* 03 Jan 2014
* check closing meta to make it clean (thanks @Dan_Silber for the report)
* add support for Open Graph
* add filter for developers => 'jmtc_markup'
* fix documentation

=  3.3.8 =
* 17 Dec 2013
* Delete JetPack Notice

=  3.3.7.1 =
* 30 Oct 2013
* Fix script bug in admin that broke saving in option page

=  3.3.7 =
* 28 Oct 2013
* Add some AJAX in option page to make things faster and smooth
* Fix some minor bugs
* Add some jQuery to let user set the plugin and have some cooler experience with the meta box ^^
* Specific Options that regard specific cards will appear/disappear on select
* To save just save the post like before

=  3.3.6 =
* 06 Sep 2013
* BIG UPDATE !
* Move option page from settings to its own page in admin
* Add support for Gallery cards
* Add support for plugin http://support.tweetpress.fr
* Add some fancy CSS to the option page (inspired by the design made by @wabbaly, special thanks to him ^^) 
* Metabox has been improved too
* Remove unecessary options such as falback for product cards in option page 
* Add links to documentation in every section of settings and in metabox
* Update documentation.html


=  3.3.5 =
* 30 Aug 2013
* Re-add Twitter meta domain that handles the "view on" on Twitter Cards.
* fix minor bug in option page (<em> not closed)

=  3.3.4 =
* 23 Aug 2013
* New feature : if your theme already have a Twitter option in profile you can now use it (just provide the key).
* However be careful, the value associated with the key MUST BE A USERNAME not a url 
* See documentation.html#general (screenshot + how to)
* New option regards only users who selected "no" as Twitter's profile option
* Hope this will help ^^
* Add new link provided by Twitter for troubleshooting in documentation: https://dev.twitter.com/docs/cards/troubleshooting
* Add basic security (empty index.html in repertories) for those who do not use htaccess rules to forbid directory listing

=  3.3.3 =
* 22 Aug 2013
* Minor change : add tips in documentation to remove cards on particular cases. 
* Add link to troubleshooting documentation

=  3.3.2 =
* 15 Aug 2013
* Remove line-breaks from meta description

=  3.3.1 =
* 13 Aug 2013
* Introduce new functionnality : opt out for meta box. If you do use meta box for some posts but do not want to use it everywhere you can disable it on each post. Datas wil be set according to the option page.
* Special thanks to @jihaisse for the idea.
* If you do not need to disable anything just ignore this option.
* Add a post meta function to reduce the amount of unused post metas.
* Fix FR translation and rebuild .po files 

=  3.3.0 =
* 09 Aug 2013
* Simpler UI is better. I just merged some fieldsets in option page to make it clearer. Don't panic I did not delete anything.
* Add a documentation (only in English for the moment)
* Crop can now be deactivated on images. Do not forget to regenerate your thumbnails if you set this option to false.
* Add an uninstall.php file (to clean database if plugin is desinstalled) 

=  3.2.9 =
* 07 Aug 2013
* bugfix: cf issue reported support regarding twitter image. 
* Twitter card Image should not be empty anymore in case you use external URL for image but no featured image.

=  3.2.8 =
* 30 Jul 2013
* bugfix with image size.
* add crop to thumbnails to prevent error due to images with sumarry large image cards

=  3.2.7 =
* 24 Jul 2013
* bug fix for users who report issues with title and desc >> "array" error
* Thanks a lot to BuckBeaver who's tested this update in real live condition to ensure it's working again.

=  3.2.6 =
* 23 Jul 2013
* IMPORTANT bugfix
* new custom fields grabbing used to break some configuration
* will work own my own function to prevent description from displaying line-breaks


=  3.2.5 =
* 22 Jul 2013
* remove strip_tags() and strip_shortcodes() in jm_tc_remove_space() I already use in get_excerpt_by_id()
* warning should be gone now

=  3.2.4 =
* 22 Jul 2013
* fix bug array to string conversion if no option is set

=  3.2.3 =
* 21 Jul 2013
* Add support for Advanced Custom Field (ACF). You can now use custom fields for title and description in case you do not use SEO plugins.
* Be careful, if WP SEO or All in One SEO is activated, title and desc from your custom fields will override.

=  3.2.2 =
* 08 Jul 2013
* Rebuilt featured image system to make it flexible. You can now set thumbnail sizes in option page AND per each post.
* In full custom mode you'll be able to see image file size. This should prevent you from using image heavier than 1MB which is not allowed for some card types such as summary_large_image.

=  3.2.1 =
* 08 Jul 2013
* Add drop down menu to select size for featured image. This is meant to fix bugs with image size in some card type such as summary large card.

=  3.2.0 =
* 30 Jun 2013
* Fix product cards typos in markup thanks Cecily for having reported this.
* It was due to unecessary colons from markup that triggers bugs for product cards validation

=  3.1.9 =
* 27 Jun 2013
* Fix some bugs in profile with checking function
* Name attribute are now compliant with W3C recommandation
* Remove meta twitter domain simply because it's useless now >> https://dev.twitter.com/docs/cards/markup-reference

=  3.1.8 =
* 19 Jun 2013
* Fix some typo and bugs reported in support
* Add brand new feature : Twitter Cards Product
* For both product and photo card, you have to select card type in metabox and save draft so you will see additional fields in metabox.
* Maybe you'll need another validation for product cards, so apply for it
* Enjoy

=  3.1.7 =
* date unknownn
* missed that update in changelog sorry

=  3.1.6 =
* 05 Jun 2013
* Remove useless spaces in content for meta description. Thanks to @aarontgrogg for having reported this issue and shared the solution.

=  3.1.5 =
* 24 May 2013
* Remove support for gallery cards because Twitter is not completely ready for it (approval is problematic)
* Add support for external images (now you can set image file URL for each post)
* Improve features in meta box

=  3.1.4 =
* 03 May 2013
* Remove markup from 404 and other pages where it's useless

=  3.1.3 =
* 29 Apr 2013
* Add some flexibility for SEO plugin option as suggested by Matsuri Times in support. Now even if SEO option is activated, you can leave SEO fields blank. The plugin will grab post title and/or desc from the content. 

=  3.1.2 =
* 27 Apr 2013
* Totally rebuild extra user profile field for multi-author blog with appropriate name for meta key (less confusing) and a real section in profile, not just another field that users might skip.
* Add some regex to eliminate any unecessary @ from input values.
* Special thank to Greglone, these hooks are good !

=  3.1.1 =
* 20 Apr 2013
* Add support for summary_large_image (newest feature)

=  3.1.0 =
* 06 Apr 2013
* Add gallery card support and fix minor bug regarding photo option
* Update link to validator 

=  3.0.5 =
* 02 Apr 2013
* Add option in settings for those who use WP SEO or All in One SEO BUT do not want to use custom meta title and desc as twitter meta
* Important ! default is yes so you have to deactivate it by selecting no on settings if you want to do this

=  3.0.0 =
* 29 mar 2013
* Add support for All in One SEO
* Double check : this time it won't break ! 

= 2.2.9 =
* 23 mar 2013
* Correct bug with wrong call of class WPSEO_Frontend()
* Sorry for multiple udpates and thanks to those who report bugs

= 2.2.8 =
* 22 mar 2013
* Correct bug in options page
* Sorry last change guys

= 2.2.7 =
* 22 mar 2013
* Add support for SEO plugins. Title can be retrieved thanks to wp_title() and meta description is no longer set according to excerpt but from the custom meta in your edit if SEO by Yoast is active.
* Enjoy

= 2.2.6 =
* 22 mar 2013
* just quit support for Open Graph because people use their own plugin for that so the markup is no longer added twice.

= 2.2.5 =
* 20 mar 2013
* fix problem with meta image

= 2.2.4 =
* 20 mar 2013
* Fix metabox that JUST DID NOT WORK ! Add support for custom post types. Next update will regard meta description...

= 2.2.3 =
* 18 mar 2013
* Fix og meta (site and creator) ignored by Twitter thanks to report by Tyrannous

= 2.2.2 =
* 17 mar 2013
* Add support for open graph
* Replace meta attr name with property which is more compliant with W3C 

= 2.2.1 =
* 13 fev 2013
* Add some user role verification for Twitter option in author's profile. Only author and admin should see the field for Twitter Cards in their profile. 
* Fix issue with attachment
* Fix notice with nonce

= 2.2 =
* 12 fev 2013
* Fix bug with posts page if homepage

= 2.1 =
* 11 fev 2013
* Fix bug for posts page

= 2.0 =
* 10 fev 2013
* fix wrong function with get_the_author_meta !

= 1.1.9 =
* 10 fev 2013
* add Twitter field in user profile in case it's not there !

= 1.1.8 =
* 10 fev 2013
* find a goodway to make code lighter, pretty lighter !

= 1.1.7 =
* 17 jan 2013
* add WP Custom-fields by GeekPress. Code is cleaner.

= 1.1.6 =
* 28 dec 2012
* fixed bug with empty args on function get_post_by_id, put html out of my translation and remove esc_html for esc_attr (silly mistakes and thanks Juliobox for your comment), next update will include lighter code to integrate metabox

= 1.1.5 =
* 27 dec 2012
* add warnings for WP SEO by Yoast users

= 1.1.4 =
* 25 dec 2012
* add features and extra options

= 1.1.3 =
* 22 dec 2012
* fix bug with photo cards and add options

= 1.1.2 =
* 22 dec 2012
* twitter cards only single posts, next updates will offer more options

= 1.1.1 =
* 22 dec 2012
* add links and styles on admin to improve readability

= 1.1 =
* 6 dec 2012
* add a function_exists() in case of the functions are already implemented in functions.php or anywhere else in your theme

= 1.0 =
* 5 dec 2012
* Initial release
* thanks GregLone for his great help regarding optimization

== Upgrade notice ==
Nothing
= 1.0 =


