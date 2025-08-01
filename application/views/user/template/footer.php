<section id="footer" class="bg-secondary bg-opacity-25 mt-3">
    <div class="container">
        <div class="row py-3">
            <div class="col-md-4 align-self-center">
                <a class="navbar-brand" href="<?=base_url()?>"><img class="header-logo" src="<?=base_url()?>assets/images/logo.png"></a>
            </div>
            <div class="col-md-4">
                <h2 class="f-700">Links</h2>
                <ul class="mt-3">
                    <li class="f-14 f-600"><a href="<?=base_url()?>">Home</a></li>
                    <li class="f-14 f-600 mt-2"><a href="<?=base_url()?>shop">Shop</a></li>
                    <?php
                                if($this->session->userdata('user_session')){?>
                    <li class="f-14 f-600 mt-2"><a href="<?=base_url()?>login/logout">Logout</a></li>
                         
                                    <?php }else{ ?>
                    <li class="f-14 f-600 mt-2"><a href="<?=base_url()?>user-login">Login</a></li>
                                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-4">
                <h2 class="f-700">Contact Us</h2>
                <ul class="mt-3">
                    <li class="f-14 f-600"><a href="javascript:void(0)"><i class="fa fa-envelope" aria-hidden="true"></i> musiciansyard@gmail.com</a></li>
                    <li class="f-14 f-600 mt-2"><a href="javascript:void(0)"><i class="fa fa-phone-square" aria-hidden="true"></i> +91 9510783504</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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