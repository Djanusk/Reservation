<?php $id = "1" ?>
<?php echo form_open_multipart("testimonials_controller/testimonials_edit/$id");?>
    <table width="500" class="table" cellpadding="0" cellspacing="2" align="center">
        <tr>
            <td width="130" align="left">Author: </td>
            <td><?php echo form_input($title); ?></td>
        </tr>
        <tr>
            <td width="130" align="left">Content: </td>
            <td><?php echo form_textarea($content); ?></td>
            <script type="text/javascript">
            CKEDITOR.replace( 'contentbox' );
            </script>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><?php echo form_submit('submit', 'Submit');?>
            </td>
        </tr>
    </table>
<?php echo form_close();?>