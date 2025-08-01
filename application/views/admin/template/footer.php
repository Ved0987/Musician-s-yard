<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/js/jnoty.min.js"></script>
<script type="text/javascript">
    function base_path(){
        return "<?= base_url(); ?>";
    }
    var base_path = '<?= base_url(); ?>';
    <?php if($this->session->flashdata('success')) {  
        $msg=$this->session->flashdata('success');
        ?>
        notification('success','','<?php echo $msg; ?>');
    <?php }else if($this->session->flashdata('danger'))
    { $msg=$this->session->flashdata('danger');
    ?>
    notification('danger','','<?php echo $msg; ?>');
<?php }else if($this->session->flashdata('warning'))
{   $msg=$this->session->flashdata('warning');
?>
notification('warning','','<?php echo $msg; ?>');
<?php  } else { 
    if($this->session->flashdata('info')){
        $msg=$this->session->flashdata('info');
        ?>
        notification('info','','<?php echo $msg; ?>');
    <?php } } ?>
    function notification(theme,message,header='') {
        if(header==''){
            header=theme;
        }
        switch (theme) {
            case "success":
            $.jnoty(message, {
                header: header,
                sticky: false,
                theme: 'jnoty-' + theme,
                icon: 'fa fa-check-circle fa-2x',
                delay:500,
                position: 'bottom-left'
            });   
            break;

            case "warning":
            $.jnoty(message, {
                sticky: false,
                header: header,
                theme: 'jnoty-' + theme,
                icon: 'fa fa-info-circle fa-2x',
                delay:500,
                position: 'bottom-left'
            });
            break;

            case "info":
            $.jnoty(message,{
                sticky: false,
                header: header,
                theme: 'jnoty-' + theme,
                icon: 'fa fa-info-circle fa-2x',
                delay:500,
                position: 'bottom-left'
            });
            break;

            case "danger":
            $.jnoty(message, {
                sticky: true,
                header: header,
                theme: 'jnoty-' + theme,
                icon: 'fa fa-info-circle fa-2x',
                delay:500,
                position: 'bottom-left'
            });
            break;

            default:
            $.jnoty(message, {
                sticky: false,
                header: header,
                theme: 'jnoty-' + theme,
                icon: 'fa fa-info-circle fa-2x',
                delay:500,
                position: 'bottom-left'
            });
        }
    }
    
</script>