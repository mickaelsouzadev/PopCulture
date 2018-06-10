<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="<?php echo $this->asset ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $this->asset ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $this->asset ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo $this->asset ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo $this->asset ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $this->asset ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo $this->asset ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo $this->asset ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $this->asset ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $this->asset ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo $this->asset ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo $this->asset ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo $this->asset ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo $this->asset ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $this->asset ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $this->asset ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $this->asset ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $this->asset ?>dist/js/demo.js"></script>

<script src="<?php echo $this->asset ?>bower_components/chart.js/Chart.js"></script>

<script src="<?php echo $this->asset ?>bower_components/ckeditor/ckeditor.js"></script>

<script src="<?php echo $this->asset ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo $this->asset ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo $this->asset ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!--<script src="<?php echo $this->asset ?>plugins/validator.js"></script>-->

<script src="<?php echo $this->asset ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $this->asset ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo $this->asset ?>dist/js/charts.js">"></script>
<!-- FastClick -->
<!-- AdminLTE App -->
<!-- page script -->
<script>
 
 var news = new Vue({
      el: '#news',
          data: {
          results: [
         
          ]
        },
        methods: {
          getNews: function() {
            axios.get('/PopCulture/app/AdminNews/get').then(response => {
              this.results = response.data
            })
          }
        },
        mounted() {
          this.getNews();
        }
  }); 
 $(document).ready(function() {

  

    function deleteNews(){
      $('.delete-news').click(function() {
          var id = $(this).val();
          $('#modal-delete-news').modal('show');
          $('#news-id').html(id);
          $('#delete').click(function() {
            $.ajax({
                url:'/PopCulture/app/AdminNews/delete/'+id,
                success: function(){
                    $('#modal-delete-news').modal('hide');
                    $('#success-delete').modal('show');
                    news.getNews();
                }
            });
        });

      });
    }


    


   setTimeout(function(){ 
      $('#example2').DataTable();  
      deleteNews();
    }, 500);
   
   


  CKEDITOR.replace('editor1');
  function CKupdate(){
    for ( instance in CKEDITOR.instances ){
        CKEDITOR.instances[instance].updateElement();
        CKEDITOR.instances[instance].setData('');
    }
  }
$.validator.setDefaults({
    errorElement: "span",
    errorClass: "help-block",
    highlight: function (element, errorClass, validClass) {
        // Only validation controls
        if (!$(element).hasClass('novalidation')) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
          
        }
    },
    unhighlight: function (element, errorClass, validClass) {
        // Only validation controls
        if (!$(element).hasClass('novalidation')) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
          
        }
    },
    errorPlacement: function (error, element) {
        $('p.help-block').hide();
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        }
        else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
            error.insertAfter(element.parent().parent());
        }
        else if (element.prop('type') === 'textarea') {
            error.insertAfter('#cke_editor1');
        }
        else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
            error.appendTo(element.parent().parent());
        }
        else {
            error.insertAfter(element);
        }
    }
});
  
  
    $('#add-news-form').validate({
        ignore: [],
        rules:{
            title: {
              required: true,
              minlength: 3
            },
            date_time: {
              required: true
            },
            image: {
              required: true
            },
            article: {
                required:  function(textarea) {
                  CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                  var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                  return editorcontent.length === 0;
                },
                minlength: 10
            }
        },
        messages: {
          title: {
            required: "Você não inseriu um titulo a notícia",
            minlength: "No mínimo 3 caracteres"
          },
          date_time:{
            required: "Você não inseriu uma data válida para a notícia"
          },
          image:{
            required: "Você não inseriu uma imagem para a notícia"
          },
          article:{
            required: "Você não inseriu um artigo para a notíca",
            minlength: "No mínimo 10 caracteres"
          }
        },
        submitHandler: function() {
          var data = new FormData($('#add-news-form')[0]);
        
          $.ajax({
            type: 'POST',
            url: '/PopCulture/app/AdminNews/save',
            data: data,
            processData: false,
            contentType: false,
            dataType: 'html',
            success: function(response) {
                $('#resp').css({
                  display: 'block'
                });
                $('#resp').html(response);
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#add-news-form').trigger('reset');
               
                 CKupdate();
               
   
            }
           });
            return false;
          }
      });

 });
</script>

</body>
</html>

















