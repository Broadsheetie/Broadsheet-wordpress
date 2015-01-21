
<div class="wrap">

    <?php screen_icon(); ?>

    <form action="options.php" method="post" id="<?php echo $plugin_id; ?>_options_form" name="<?php echo $plugin_id; ?>_options_form">

        <?php settings_fields($plugin_id . '_options'); ?>

        <h2>App Banners &raquo; Settings</h2>
        <p>Enter your nine-digit app ID below. To find your app ID from the <a href="http://linkmaker.itunes.apple.com/us/" target="_blank">iTunes Link Maker</a>, type the name of your app in the Search field, and select the appropriate country and media type. In the results, find your app and select iPhone App Link in the column on the right. Your app ID is the nine-digit number in between id and ?mt.</p>
        <table class="widefat">
            <thead>
                   <tr>
                    <th><input type="submit" name="submit" value="Save Settings" class="button-primary" /></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th><input type="submit" name="submit" value="Save Settings" class="button-primary" /></th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>
                        <label for="APP_BANNERS_apple_id">
                            <p>Apple App ID</p>
                            <p><input placeholder="Your Apple ID" type="text" style="width:272px;height:24px;" name="APP_BANNERS_apple_id" value="<?php echo $appleID; ?>" /></p>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="APP_BANNERS_android_id">
                            <p>Android App ID</p>
                            <p><input placeholder="Your Android ID" type="text" style="width:272px;height:24px;" name="APP_BANNERS_android_id" value="<?php echo $androidID; ?>" /></p>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="APP_BANNERS_author">
                            <p>App Author <br><small>What the author of the app should be in the banner (defaults to <meta name='author'> or hostname)</small></p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_author" value="<?php echo $author; ?>" /></p>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="APP_BANNERS_price">
                            <p>App Price</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_price" value="<?php echo $price; ?>" /></p>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="APP_BANNERS_title">
                            <p>App Title
                                <br>
                                <small>What the title of the app should be in the banner (defaults to Title Tag from App Store)</small></p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_title" value="<?php echo $title; ?>" /></p>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="APP_BANNERS_icon">
                            <p>App Icon
                                <br>
                                <small>The URL of the icon (defaults to link from App Store)</small>
                            </p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_icon" value="<?php echo $icon; ?>" /></p>
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="APP_BANNERS_button">
                            <p>Text on Button
                                <br>
                                <small>Text on the install button</small></p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_button" value="<?php echo $button; ?>" /></p>
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="APP_BANNERS_daysHidden">
                            <p>Duration in DAYS to hide the banner after being closed (0 = always show banner)</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_daysHidden" value="<?php if(empty($daysHidden)){ echo '0'; } else { echo $daysHidden;} ?>" /></p>
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="APP_BANNERS_daysReminder">
                            <p>Duration in DAYS to hide the banner after 'VIEW' is clicked (0 = always show banner)</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_daysReminder" value="<?php if(empty($daysReminder)){ echo '0'; } else { echo $daysReminder;} ?>" /></p>
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="APP_BANNERS_speedOut">
                            <p>Close animation speed of the banner</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_speedOut" value="<?php if(empty($speedOut)){ echo '400'; } else { echo $speedOut;} ?>" /></p>
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="APP_BANNERS_speedIn">
                            <p>Show animation speed of the banner)</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_speedIn" value="<?php if(empty($speedIn)){ echo '300'; } else { echo $speedIn;} ?>" /></p>
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="APP_BANNERS_iconGloss">
                            <p>Force gloss effect for iOS even for precomposed (true or false)</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_iconGloss" value="<?php if(empty($iconGloss)){ echo 'false'; } else { echo $iconGloss;} ?>" /></p>
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="APP_BANNERS_inAppStore">
                            <p>Text of price for iOS</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_inAppStore" value="<?php if(empty($inAppStore)){ echo 'On the App Store'; } else { echo $inAppStore;} ?>" /></p>
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="APP_BANNERS_inGooglePlay">
                            <p>Text of price for Android</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_inGooglePlay" value="<?php if(empty($inGooglePlay)){ echo 'In Google Play'; } else { echo $inGooglePlay;} ?>" /></p>
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="APP_BANNERS_appStoreLanguage">
                            <p>App Store Language (US)</p>
                            <p><input type="text" style="width:272px;height:24px;" name="APP_BANNERS_appStoreLanguage" value="<?php if(empty($appStoreLanguage)){ echo 'US'; } else { echo $appStoreLanguage;} ?>" /></p>
                        </label>
                    </td>
                </tr>





            </tbody>
        </table>

    </form>
</div>