<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Page Blog
 */

$path_img = esc_url( get_template_directory_uri() ).'/images/';

get_header(); ?>

 
<div class="fill nopadding">       
    <div class="col-xs-12 nopadding">
     

 <?php
    
        //Ottengo i valori relativi ai campi di descrizione
        $args = array(
            'posts_per_page'   => 5,
            'offset'           => 0,
            'category'         => '',
            'category_name'    => '',
            'orderby'          => 'date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'post',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'author'	   => '',
            'post_status'      => 'publish',
            'suppress_filters' => true 
        );
        
        $fields = get_posts($args); 
        
       
        
        
    ?>
        <div id="inside" class="blog-list"> 
            <div class="background-logo"></div>
        <?php printPreviewBlogPosts($fields)   ; ?>
            
        <?php if(count($fields) > 4) { ?>
            <div id="more-results"></div>
            <div class="more-results-search">
                <input type="hidden" name="number-current-posts" value="5" autocomplete="off" />
                <a id="more-post">Show more</a> 
            </div>            
        <?php } ?>    
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                
                 
                jQuery('#more-post').click(function(){
                    var offset = jQuery('.more-results-search input[name=number-current-posts]').val();
                    
                    jQuery.ajax({
                        type:'POST',
                        dataType: 'json',
                        url: '<?php echo get_home_url().'/wp-admin/admin-ajax.php' ?>',
                        data: {
                            action : 'my_ajax',
                            offset: offset
                        },                        
                        success: function(data){                           
                            printMorePosts(data);   
                            var newOffset = parseInt(jQuery('.more-results-search input[name=number-current-posts]').val()) + 4;
                            jQuery('.more-results-search input[name=number-current-posts]').val(newOffset);
                        },
                        error : function(){
                            alert('error');
                        }
                    });
                });                
                
            });
            
            function printMorePosts(data){
                jQuery(function(){                   
                     
                    var html = '<div class="new-result">'; 
                    if(data.length > 0){
                        var count_post = 1;
                        for(var i=0; i < data.length; i++){
                            if(count_post % 2 !== 0){
                                html+='<div class="row">';
                            }
                            html+='<div class="col-xs-12 col-md-6 not-first-post">';
                            html+= printSinglePost(data[i]);
                            html+='</div>';
                            if(count_post % 2 === 0 || count_post === (data.length)){
                                html+='</div>';
                            }                           
                           count_post++;
                       }
                    }
                    else{
                        //html += '<div class="no-articoli">Non ci sono altri articoli da visualizzare</div>';
                        jQuery('#more-post').hide();
                    }
                    html+='</div>';
                    html+= '<script>';
                    html+='resizeCoverLinkBlogPost()';
                    html+='</script';
                    html+='>';
                    
                    jQuery('#more-results').append(html);
                    jQuery('.new-result').fadeIn('slow');
                });
            }
            
            function printSinglePost(item){
                var html = "";
                html+='<div class="blog-post">';
                html+='<h2 class="red-1">'+item.title+'</h2>';
                html+='<h4>'+item.subtitle+'</h4>';
                html+='<div class="image"><div class="link"><a href="'+item.link+'">See more > </a></div><a href="'+item.link+'"><div class="image-post" style="background:url(\''+item.image+'\') center center"></div></a></div>';
                html+='<div class="excerpt"><p>'+item.excerpt+'</p></div>';                
                html+='</div>';
                return html;
            }
            
          
            
        </script>
    
    </div>
</div>


    
<?php get_footer(); ?>
