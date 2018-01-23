
              <?php
                /*
                 * This is the default post format.
                 *
                 * So basically this is a regular post. if you don't want to use post formats,
                 * you can just copy ths stuff in here and replace the post format thing in
                 * single.php.
                 *
                 * The other formats are SUPER basic so you can style them as you like.
                 *
                 * Again, If you want to remove post formats, just delete the post-formats
                 * folder and replace the function below with the contents of the "format.php" file.
                */
              ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                <div id="ajaxload">

                <header class="article-header">

                  <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>

                  <div class="largescreenshotContainer">
                <?php
                  if( function_exists('get_field') && get_field('screenshot') ):
                    $attachment_id = get_field('screenshot'); $size = "large";
                    $image = wp_get_attachment_image_src($attachment_id, $size);


                    echo "<img class='largescreenshot' src='".$image[0]."' alt=' ' >";
                  else:
                    echo "<img class='largescreenshot' src='http://immediatenet.com/t/l3?Size=1280x1024&URL=http://".get_field('site_url')."' alt=' ' >";
                    //echo "<div class='screenshotContainer'><div class='overlay'><div class='overlaytext'></div></div><img class='screenshot' src='http://api.thumbalizr.com/?url=http://".get_field('site_url')."&width=350' alt=' ' ></div>";
                  endif;


                ?>
              </div>
                  <p class="byline vcard">
                    <?php //printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
                  </p>

                </header> <?php // end article header ?>

                <section class="entry-content cf" itemprop="articleBody">


                  <?php
                    // the content (pretty self explanatory huh)
                    the_content();

                    /*
                     * Link Pages is used in case you have posts that are set to break into
                     * multiple pages. You can remove this if you don't plan on doing that.
                     *
                     * Also, breaking content up into multiple pages is a horrible experience,
                     * so don't do it. While there are SOME edge cases where this is useful, it's
                     * mostly used for people to get more ad views. It's up to you but if you want
                     * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
                     *
                     * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
                     *
                    */

                  ?>

                <div class="row">
                  <div class="span-50 configuration">
                    <h3>Configuration</h3>

                    <?php if(get_field('site_url_assigned')) { ?>
                      <p class="row"><span class="label span-33">URL:</span> <span class="span-66"><a href="<?php the_field('site_url') ?>" target="_blank"><?php the_field('site_url') ?></a></span></p>

                      <p class="row"><span class="label span-33">Server:</span> <span class="span-66"><?php $field = get_field_object('server');
  $value = get_field('server');
  $label = $field['choices'][ $value ]; echo $label; ?></span></p>

                      <p class="row"><span class="label span-33">Server Path: </span> <span class="span-66">/var/www/<?php the_field('ftp_path') ?></span></p>
                    <?php } ?>



                    <?php if(get_field('development_model') == "git") {

                      if(get_field('git_repo_location') == "github") { ?>



                          <?php

                          $owner = get_field('github_organization');
                          $repo = get_field('github_repository');

                          echo "<p class='row'><span class='label span-33'>Version Control: </span> <span class='span-66'><a href='http://github.com/".$owner."/".$repo."' target='_blank'>Github</a></span></p>";
                          echo "<p class='row'><span class='label span-33'>Latest Commit:</span> <span class='span-66'><a href='http://github.com/".$owner."/".$repo."/commit' class='latestCommit' target='_blank'>Latest Commit</a></span></p>"
                          ?>




                      <?php } else if(get_field('git_repo_location') == "bitbucket") { ?>


                      <!--	<script>
                          var bitinstance = bitbucket.repository(<?php get_field('bitbucket_user'); ?>, <?php get_field('bitbucket_repo'); ?>)
                          bitinstance.details(function (repo) {
                            console.log(repo)
                          })
                        </script>-->

                <?php } else if(get_field('git_repo_location') == "stash") {


                      }


                  } else {
                    //If the site uses just FTP...


                  } ?>


                    <?php if(get_field('preprocessors') != "none") { ?>
                      <p><span class="label"><?php the_field('preprocessors') ?> Configuration:</span> <?php the_field('preprocessor_instructions') ?></p>
                    <?php } ?>
                  </div>

                  <div class="span-50 loggedIssues">
                    <h3>Logged Issues</h3>

                    <div class="issuesContainer">No Issues</div>
                  </div>


                </div>

                </section> <?php // end article section ?>

                <footer class="article-footer">

                  <?php //printf( __( 'Filed under: %1$s', 'bonestheme' ), get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

                </footer> <?php // end article footer ?>

                <?php //comments_template(); ?>
                </div>
              </article> <?php // end article ?>
