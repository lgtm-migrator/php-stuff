<?php
    echo base_url();
    $this->load->library('duo');
    echo form_open('admin', array('id'=> "duo_form"));
    echo form_close();
?>

<iframe id="duo_iframe" width="100%" height="500" frameborder="0"></iframe>
<script type="text/javascript" src="<? echo base_url(); ?>resources/js/Duo-Web-v1.js" ></script>
<script type="text/javascript" >
    Duo.init({
        'host':'<?php echo $host; ?>',
        'post_action':'<?php echo $post_action; ?>',
        'sig_request':'<?php echo $sig_request; ?>'
    });
</script>
