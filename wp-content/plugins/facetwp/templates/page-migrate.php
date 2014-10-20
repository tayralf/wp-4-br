<?php

$export = array();
$settings = FWP()->helper->settings_raw;

foreach ( $settings['facets'] as $facet ) {
    $export['facet-' . $facet['name']] = 'Facet - ' . $facet['label'];
}

foreach ( $settings['templates'] as $template ) {
    $export['template-' . $template['name']] = 'Template - '. $template['label'];
}

?>
<style type="text/css">
.facetwp-content .export-code,
.facetwp-content .import-code {
    height: 100px;
}

.export-code {
    display: none;
}
</style>

<h3 style="margin-top:0"><?php _e( 'Export', 'fwp' ); ?></h3>
<table style="width:100%">
    <tr>
        <td valign="top" style="width:260px">
            <select class="export-items" multiple="multiple" style="width:240px; height:100px">
                <?php foreach ( $export as $val => $label ) : ?>
                <option value="<?php echo $val; ?>"><?php echo $label; ?></option>
                <?php endforeach; ?>
            </select>
            <div style="margin-top:5px"><a class="button export-submit"><?php _e( 'Export', 'fwp' ); ?></a></div>
        </td>
        <td valign="top">
            <textarea class="export-code" placeholder="Loading..."></textarea>
        </td>
    </tr>
</table>
<h3><?php _e( 'Import', 'fwp' ); ?></h3>
<div><textarea class="import-code" placeholder="<?php _e( 'Paste the import code here', 'fwp' ); ?>"></textarea></div>
<div><input type="checkbox" class="import-overwrite" /> <?php _e( 'Overwrite existing items?', 'fwp' ); ?></div>
<div style="margin-top:5px"><a class="button import-submit"><?php _e( 'Import', 'fwp' ); ?></a></div>
