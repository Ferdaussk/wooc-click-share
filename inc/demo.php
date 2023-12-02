<?php
if (!defined('ABSPATH')) exit;
function wclsr_sk_single(){
$wclsr_topTitle = get_option( 'wclsr-toptitle', 'WooC Click Share' )==true?'<h2 class="wclsr-top-ttl__">'.__(get_option( 'wclsr-toptitle', 'WooC Click Share' )).'</h2>':'';
echo get_option( 'wclsr-notice-position', 'top' )=='top'?$wclsr_topTitle:'';
echo '<div class="wclsr_btn_wrap wclsr_style'.get_option( 'wclsr-estimass-presets', '1' ).' wclsr_btn_common">';
?>
    <div class="main-container">
    <?php
    $options = get_option('sk_repeater_settings');
    if ($options) {
        foreach ($options as $item) {
            if (isset($item['select'])) {
                ?><?php $types = esc_html($item['select']); ?>
                    <div class="wclsr_btn_link_wrap">
                        <?php
                        $current = get_the_permalink();
                        $titlE = get_the_title();
                        $link = '';
                        if($types == 'facebook'): 
                            $wclsr_Alink = (!empty($link))?'https://www.facebook.com/sharer/sharer.php?u='.$link:'https://www.facebook.com/sharer/sharer.php?u='.$current; 
                            ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-facebook"></i>
                            </a><?php
                        elseif($types == 'twitter'): 
                            $wclsr_Alink = (!empty($link))?'https://twitter.com/intent/tweet?text='.$link:'https://twitter.com/intent/tweet?text='.$titlE.'&amp;url='.$current; 
                            ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a><?php
                        elseif($types == 'whatsapp'): 
                            $wclsr_Alink = (!empty($link))?'https://api.whatsapp.com/send?text='.$link:'https://api.whatsapp.com/send?text='.$titlE.$current; 
                            ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a><?php
                        elseif($types == 'linkedin'): 
                            $wclsr_Alink = (!empty($link))?'https://www.linkedin.com/sharing/share-offsite/?url='.$link:'https://www.linkedin.com/sharing/share-offsite/?url='.$current; 
                            ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a><?php
                        elseif($types == 'reddit'): 
                            $wclsr_Alink = (!empty($link))?'https://www.reddit.com/submit?url='.$link:'https://www.reddit.com/submit?url='.$current.'&amp;title='.$titlE; 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-reddit-alien"></i>
                            </a><?php
                        elseif($types == 'tumblr'): 
                            $wclsr_Alink = (!empty($link))?'https://www.tumblr.com/share/link?url='.$link:'https://www.tumblr.com/share/link?url='.$current.'&amp;name='. $titlE.'&amp;description='.get_the_excerpt(); 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-tumblr"></i>
                            </a><?php
                        elseif($types == 'telegram'): 
                            $wclsr_Alink = (!empty($link))?'https://telegram.me/share/url?url='.$link:'https://telegram.me/share/url?url='.$current.'&amp;text='.$titlE; 
                                    ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-telegram"></i>
                            </a><?php
                        elseif($types == 'email'): 
                            $wclsr_Alink = (!empty($link))?'mailto:?subject='.$link:'mailto:?subject='.$titlE.'&body='.$current; 
                            ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-regular fa-envelope"></i>
                            </a><?php
                        elseif($types == 'viber'): 
                            $wclsr_Alink = (!empty($link))?'viber://forward?text='.$link:'viber://forward?text='.$titlE.$current; 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-viber"></i>
                            </a><?php
                        elseif($types == 'vk'): 
                            $wclsr_Alink = (!empty($link))?'http://vk.com/share.php?url='.$link:'http://vk.com/share.php?url='.$current; 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-vk"></i>
                            </a><?php
                        elseif($types == 'xing'): 
                            $wclsr_Alink = (!empty($link))?'https://www.xing.com/spi/shares/new?url='.$link:'https://www.xing.com/spi/shares/new?url='.$current; 
                                    ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-xing"></i>
                            </a><?php
                        elseif($types == 'pocket'): 
                            $wclsr_Alink = (!empty($link))?'https://getpocket.com/save?url='.$link:'https://getpocket.com/save?url='.$current.'&title='.$titlE; 
                            ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-get-pocket"></i>
                            </a><?php
                        elseif($types == 'digg'): 
                            $wclsr_Alink = (!empty($link))?'http://digg.com/submit?url='.$link:'http://digg.com/submit?url='.$current; 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-digg"></i>
                            </a><?php
                        elseif($types == 'stumbleupon'): 
                            $wclsr_Alink = (!empty($link))?'http://www.stumbleupon.com/submit?url='.$link:'http://www.stumbleupon.com/submit?url='.$current.'&title='.$titlE; 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-stumbleupon"></i>
                            </a><?php
                        elseif($types == 'weibo'): 
                            $wclsr_Alink = (!empty($link))?'http://service.weibo.com/share/share.php?url='.$link:'http://service.weibo.com/share/share.php?url='.$current.'&title='.$titlE; 
                                    ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-weibo"></i>
                            </a><?php
                        elseif($types == 'renren'): 
                            $wclsr_Alink = (!empty($link))?'http://widget.renren.com/dialog/share?resourceUrl='.$link:'http://widget.renren.com/dialog/share?resourceUrl='.$current.'&title='.$titlE; 
                            ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-renren"></i>
                            </a><?php
                        elseif($types == 'skype'): 
                            $wclsr_Alink = (!empty($link))?'skype:?chat&topic='.$link:'skype:?chat&topic='.$titlE.'&add='.$current; 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-skype"></i>
                            </a><?php
                        elseif($types == 'pinterest'): 
                            $wclsr_Alink = (!empty($link))?'https://pinterest.com/pin/create/button/?url='.$link:'https://pinterest.com/pin/create/button/?url='.$current.'&amp;media='.wp_get_attachment_url( get_share_thumbnail_id($share->ID) ).'&amp;description='.get_the_excerpt(); 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-pinterest-p"></i>
                            </a><?php
                        elseif($types == 'youtube'): 
                            $wclsr_Alink = (!empty($link))?'https://www.youtube.com/share?url='.$link:'https://www.youtube.com/share?url='.$current; 
                                    ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-youtube"></i>
                            </a><?php
                        elseif($types == 'instagram'): 
                            $wclsr_Alink = (!empty($link))?'https://www.instagram.com/share?url='.$link:'https://www.instagram.com/share?url='.$current.'&title='.$titlE; 
                            ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-instagram"></i>
                            </a><?php
                        elseif($types == 'quora'): 
                            $wclsr_Alink = (!empty($link))?'http://www.quora.com/share?url='.$link:'http://www.quora.com/share?url='.$current.'&title='.$titlE; 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-quora"></i>
                            </a><?php
                        elseif($types == 'snapchat'): 
                            $wclsr_Alink = (!empty($link))?'https://www.snapchat.com/share?url='.$link:'https://www.snapchat.com/share?url='.$current; 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-snapchat"></i>
                            </a><?php
                        elseif($types == 'flickr'): 
                            $wclsr_Alink = (!empty($link))?'https://www.flickr.com/search/?q='.$link:'https://www.flickr.com/search/?q='.$titlE; 
                                    ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-flickr"></i>
                            </a><?php
                        elseif($types == 'odnoklassniki'): 
                            $wclsr_Alink = (!empty($link))?'https://connect.ok.ru/offer?url='.$link:'https://connect.ok.ru/offer?url='.urlencode($current); 
                            ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-odnoklassniki"></i>
                            </a><?php
                        elseif($types == 'blogger'): 
                            $wclsr_Alink = (!empty($link))?'https://www.blogger.com/share?u='.$link:'https://www.blogger.com/share?u='.urlencode($current); 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-blogger"></i>
                            </a><?php
                        elseif($types == 'evernote'): 
                            $wclsr_Alink = (!empty($link))?'https://www.evernote.com/clip.action?url='.$link:'https://www.evernote.com/clip.action?url='.urlencode($current).'&title='.urlencode($titlE); 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-evernote"></i>
                            </a><?php
                        elseif($types == 'delicious'): 
                            $wclsr_Alink = (!empty($link))?'https://del.icio.us/post?url='.$link:'https://del.icio.us/post?url='.urlencode($current).'&amp;title='.urlencode($titlE); 
                                    ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-delicious"></i>
                            </a><?php
                        elseif($types == 'surfingbird'): 
                            $wclsr_Alink = (!empty($link))?'http://surfingbird.ru/share?url='.$link:'http://surfingbird.ru/share?url='.$current.'&title='.$titlE; 
                            ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-solid fa-blog"></i>
                            </a><?php
                        elseif($types == 'liveinternet'): 
                            $wclsr_Alink = (!empty($link))?'http://www.liveinternet.ru/journal_post.php?action=n_add&cnurl='.$link:'http://www.liveinternet.ru/journal_post.php?action=n_add&cnurl='.$current.'&cntitle='.$titlE; 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-solid fa-camera-retro"></i>
                            </a><?php
                        elseif($types == 'buffer'): 
                            $wclsr_Alink = (!empty($link))?'https://bufferapp.com/add?url='.$link:'https://bufferapp.com/add?url='.urlencode($current).'&amp;text='.urlencode($titlE); 
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-buffer"></i>
                            </a><?php
                        elseif($types == 'instapaper'): 
                            $wclsr_Alink = (!empty($link))?'http://www.instapaper.com/hello2?url='.$link:'http://www.instapaper.com/hello2?url='.urlencode($current).'&title='.urlencode($titlE);
                                    ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-solid fa-comment"></i>
                            </a><?php
                        elseif($types == 'wordpress'): 
                            $wclsr_Alink = (!empty($link))?'https://wordpress.com/press-this.php?u='.$link:'https://wordpress.com/press-this.php?u='.urlencode($current).'&t='.urlencode($titlE);
                            ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-brands fa-wordpress-simple"></i>
                            </a><?php
                        elseif($types == 'baidu'): 
                            $wclsr_Alink = (!empty($link))?'http://cang.baidu.com/do/add?iu=&it=&fr=ien#nw=1&iu=&link='.$link:'http://cang.baidu.com/do/add?iu=&it=&fr=ien#nw=1&iu=&link='.esc_url($current).'&title='.esc_attr($titlE);
                                ?><a class="wclsr_btn_link" href="<?php echo esc_url($wclsr_Alink); ?>" onclick="window.open(this.href, '_blank', 'width=400,height=400,left='+screen.width/2.5+',top='+screen.height/3); return false;">
                                <i class="fa-solid fa-hippo"></i>
                            </a><?php
                        elseif($types == 'line'): 
                            $wclsr_Alink = (!empty($link))?'https://line.me/R/msg/text/?'.$link:'https://line.me/R/msg/text/?'.$titlE.'%0A'.$current;
                        endif;
                        ?>
                    </div>
                <?php
            }
        }
    }
    ?>
</div>
</div>
<?php
echo get_option( 'wclsr-notice-position', 'bottom' )=='bottom'?$wclsr_topTitle:'';
}