<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly

//  Process non-SAPI options for Pro Version

function weaverii_process_options_admin_pro() {

    if (weaverii_submitted('backup_settings')) {
        $name = weaverii_savebackup();
        if ($name !== false)
            weaverii_save_msg(weaverii_t_('All current main and advanced options backed up in:' /*a*/ ).' "'. $name . '.w2b"');
        else
            weaverii_save_msg(weaverii_t_('ERROR: Saving backup failed.' /*a*/ ));
    }

    if (weaverii_submitted('filesavetheme')) {
        $base = sanitize_file_name($_POST['savethemename']);
        if (weaverii_dev_mode()) weaverii_setopt('wii_hide_old_weaver',0);
        $temp_url =  weaverii_write_current_theme($base);
        if ($temp_url == '')
            weaverii_save_msg(weaverii_t_('Invalid name supplied to save theme to file.' /*a*/ ));
        else
            weaverii_save_msg(weaverii_t_("All current main and advanced options saved in " /*a*/ ) . $temp_url);
    }

    if (weaverii_submitted('restoretheme')) {
        $base = $_POST['wii_restorename'];
        $valid = validate_file($base);		// make sure an ok file name
        $fn = weaverii_f_uploads_base_dir() .'weaverii-subthemes/'.$base;

        if ($valid < 1 && weaverii_upload_theme($fn)) {
            $t = weaverii_getopt('wii_themename');
            if ($t == '') $t = weaverii_getopt('wii_subtheme');
            if ($t == '') $t = 'Antique Ivory';    /* did we save a theme? */
            weaverii_setopt('wii_theme_filename','custom');	// we have a custom theme now...
            weaverii_save_msg(weaverii_t_("Weaver II theme restored from file: " /*a*/ ).$t);
        } else {
            weaverii_save_msg('<em style="color:red;">'. weaverii_t_('INVALID FILE NAME PROVIDED - Try Again' /*a*/ ). "($fn)" . '</em>');
        }
    }

    if (weaverii_submitted('save_mobiletheme')) {
        weaverii_save_msg(weaverii_t_("Current settings saved in alternate Mobile View database entry." /*a*/ ));
        $weaverii_opts = get_option( apply_filters('weaver_options','weaverii_settings'),array());
        $weaverii_opts['_wii_mobile_alt_theme'] = 'saved_mobile';		// force  these two
        $weaverii_opts['_wii_sim_mobile'] = false;
        $weaverii_opts['_wii_inline_style'] = 'on';
        weaverii_wpupdate_option('weaverii_settings_mobile',$weaverii_opts, 'save_mobiletheme');
        $weaverii_pro_opts = get_option( apply_filters('weaver_options','weaverii_pro') ,array());
        weaverii_wpupdate_option('weaverii_pro_mobile',$weaverii_pro_opts, 'save_mobile_theme');
    }

    if (weaverii_submitted('renametheme')) {
        $name = isset($_POST['wii_themename']) ? $_POST['wii_themename'] : '';
        $desc = isset($_POST['wii_theme_description']) ? $_POST['wii_theme_description'] : '';
        if ($name) weaverii_setopt('wii_themename',$name);
        if ($desc) weaverii_setopt('wii_theme_description',$desc);
    }

    if (weaverii_submitted('deletetheme')) {
        $myFile = isset($_POST['selectName']) ? $_POST['selectName'] : '';
        $valid = validate_file($myFile);
        if ($valid < 1 && $myFile != "None") {
            weaverii_f_delete(weaverii_f_uploads_base_dir() .'weaverii-subthemes/'.$myFile);
            echo '<div style="background-color: rgb(255, 251, 204);" id="message" class="updated fade"><p>File: <strong>'.$myFile.'</strong> has been deleted.</p></div>';
        } else {
            echo '<div style="background-color: rgb(255, 251, 204);" id="message" class="updated fade"><p>File: <strong>'.$myFile.'</strong> invalid file name, not deleted.</p></div>';
        }
    }
}

?>
