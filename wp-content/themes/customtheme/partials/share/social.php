<ul class="socials list">
    <li class="share-it">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>&t=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500');
                return false;" class="item facebook">
            <i class="fa fa-facebook"></i>
        </a>
    </li>
    <li class="share-it"><a href="https://plus.google.com/share?url=<?php echo urlencode(get_the_permalink()); ?>&amp;title=<?php wp_title('') ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500');
            return false;" class="item google"><i class="fa fa-google-plus"></i></a></li>
    <li class="share-it"><a href="https://www.linkedin.com/cws/share?url=<?php echo urlencode(get_the_permalink()); ?>&title=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500');
            return false;" class="item linkedin"><i class="fa fa-linkedin"></i></a></li>
    <li class="share-it">
        <a href="http://www.twitter.com/share?url=<?php echo urlencode(get_the_permalink()); ?>" class="item twitter" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500');
                return false;">
            <i class="fa fa-twitter"></i>
        </a>
    </li>
    <?php
    if (wp_is_mobile()) {
        ?>
        <li class="share-it">
            <a href="fb-messenger://share/?link=<?php echo urlencode(get_the_permalink()); ?>&app_id=1854903944781072" class="item bg-icon" >
                <i class="fa face-sms"></i>
            </a>
        </li>   
        <li class="share-it">
            <a href="viber://forward?text=<?php echo urlencode(get_the_permalink()); ?>" class="item bg-icon" >
                <i class="fa viber-sms"></i>
            </a>
        </li> 
        <li class="share-it">
            <a href="whatsapp://send?text=<?php echo urlencode(get_the_permalink()); ?>" class="item bg-icon" >
                <i class="fa whatsapp-sms"></i>
            </a>
        </li> 
<!--        <li class="share-it">
            <a href="sms:?body=<?php //the_permalink(); ?>" class="item bg-icon" >
                <i class="fa sms-sms"></i>
            </a>
        </li>-->
         <li class="share-it">
             <a target="_blank" href="https://sp.zalo.me/share_inline?d=<?php echo base64_encode(json_encode(array('url' => urlencode(get_the_permalink())))); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500'); return false;" class="item bg-icon"><i class="fa zalo-sms"></i></a>
        </li>
        <?php
    }else{
        ?>
        <li class="share-it">
            <a href="viber://forward?text=<?php echo urlencode(get_the_permalink()); ?>" class="item bg-icon" >
                <i class="fa viber-sms"></i>
            </a>
        </li> 
          <li class="share-it">
              <a href="https://sp.zalo.me/share_inline?d=<?php echo base64_encode(json_encode(array('url' => urlencode(get_the_permalink())))); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500'); return false;" class="item bg-icon"><i class="fa zalo-sms"></i></a>
        </li>  
        <?php
    }
    ?>
       

</ul>
