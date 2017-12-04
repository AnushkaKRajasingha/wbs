<?php
/**
 * Created by Anushka K R.
 * Dev. Ref: http://www.anushkar.com
 * Dev. Public Profile: https://www.upwork.com/fl/anushkakrajasingha
 * Date: 11/28/2017
 * Time: 5:24 PM
 */
?>
<section class="content">
    <div class="container">
        <div class="col-12 padding-x">

            <?php
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>

            <div class="section-game-results">
                <div class="h2 black">Game Results</div>

                <div class="game-result-section">
                    <div class="h3 black">Famous Mothers</div>
                    <div class="table-wrap text-center text-md-left">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Place</th>
                                <th scope="col">Guest Nickname</th>
                                <th scope="col">Score</th>
                                <th scope="col">Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"><div class="number-wrap number number-1">1</div></th>
                                <td>Cassie</td>
                                <td>60%</td>
                                <td>01:06</td>
                            </tr>
                            <tr>
                                <th scope="row"><div class="number-wrap number number-2">2</div></th>
                                <td>Grandma Palmer</td>
                                <td>60%</td>
                                <td>01:45</td>
                            </tr>
                            <tr>
                                <th scope="row"><div class="number-wrap number number-3">3</div></th>
                                <td>Uncle James</td>
                                <td>60%</td>
                                <td>01:45</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="game-result-section">
                    <div class="h3 black">Famous Fathers</div>
                    <div class="table-wrap text-center text-md-left">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Place</th>
                                <th scope="col">Guest Nickname</th>
                                <th scope="col">Score</th>
                                <th scope="col">Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"><div class="number-wrap number number-1">1</div></th>
                                <td>Cassie</td>
                                <td>60%</td>
                                <td>01:06</td>
                            </tr>
                            <tr>
                                <th scope="row"><div class="number-wrap number number-2">2</div></th>
                                <td>Grandma Palmer</td>
                                <td>60%</td>
                                <td>01:45</td>
                            </tr>
                            <tr>
                                <th scope="row"><div class="number-wrap number number-3">3</div></th>
                                <td>Uncle James</td>
                                <td>60%</td>
                                <td>01:55</td>
                            </tr>
                            <tr>
                                <th scope="row"><div class="number-wrap">4</div></th>
                                <td>Auntie Norah</td>
                                <td>40%</td>
                                <td>02:05</td>
                            </tr>
                            <tr>
                                <th scope="row"><div class="number-wrap">5</div></th>
                                <td>Kody & Kammy</td>
                                <td>40%</td>
                                <td>02:05</td>
                            </tr>
                            <tr>
                                <th scope="row"><div class="number-wrap">6</div></th>
                                <td>Courtney</td>
                                <td>40%</td>
                                <td>02:08</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="section-announcement">
                <div class="h2 black">Announcement</div>

                <div class="announcement-section text-center">
                    <div class="announcement">
                        <div class="announcement-wrap">
                            <img src="<?php echo  get_template_directory_uri(); ?>/img/heart.png" alt="" class="mb-25">
                            <p class="fz-28"><strong>Welcome to the World!</strong></p>
                            <div class="hr-big"></div>
                            <p class="fz-21"><strong>Eleanor Rosalind Sawyer</strong></p>
                            <p class="uppercase"><strong>Born: December 31, 2017 at 3:36 AM</strong></p>
                            <p>6 Pounds 7 Ounces</p>
                            <p>18 Inches</p>
                            <div class="hr"></div>
                            <p class="fz-21"><strong>Ezra Theodore Sawyer</strong></p>
                            <p class="uppercase"><strong>Born: December 31, 2017 at 2:55 AM</strong></p>
                            <p>6 Pounds 11 Ounces</p>
                            <p>19 Inches</p>
                        </div>
                    </div>
                </div>

                <div class="announcement-section text-center">
                    <div class="announcement">
                        <div class="img-wrap">
                            <img src="<?php echo  get_template_directory_uri(); ?>/img/baby.jpg" alt="">
                            <div class="img-title">Welcome to the World!</div>
                        </div>
                        <div class="announcement-wrap">
                            <p class="fz-21"><strong>Eleanor Rosalind Sawyer</strong></p>
                            <p class="uppercase"><strong>Born: December 31, 2017 at 3:36 AM</strong></p>
                            <p>6 Pounds 7 Ounces</p>
                            <p>18 Inches</p>
                            <div class="hr"></div>
                            <p class="fz-21"><strong>Ezra Theodore Sawyer</strong></p>
                            <p class="uppercase"><strong>Born: December 31, 2017 at 2:55 AM</strong></p>
                            <p>6 Pounds 11 Ounces</p>
                            <p>19 Inches</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="section-album">
                <div class="h2 black">Photo & Video Album</div>

                <div class="row text-center justify-content-center">
                    <div class="col-12 col-sm-3">
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/1.jpg" alt=""></a></div></div>
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/2.jpg" alt=""></a></div></div>
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/3.jpg" alt=""></a></div></div>
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/4.jpg" alt=""></a></div></div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/5.jpg" alt=""></a></div></div>
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/6.jpg" alt=""></a></div></div>
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/7.jpg" alt=""></a></div></div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/8.jpg" alt=""></a></div></div>
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/9.jpg" alt=""></a></div></div>
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/10.jpg" alt=""></a></div></div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/11.jpg" alt=""></a></div></div>
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/12.jpg" alt=""></a></div></div>
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/13.jpg" alt=""></a></div></div>
                        <div><div class="zoom-link-wrap"><a href="#" class="zoom-link"><img src="<?php echo  get_template_directory_uri(); ?>/img/photos/14.jpg" alt=""></a></div></div>
                    </div>
                </div>

            </div>

            <div class="section-timeline">
                <div class="h2 black">Timeline</div>

                <div class="scale">

                    <div class="row">
                        <div class="col col-md-6">
                            <div class="my-card-wrap">
                                <div class="my-card">
                                    <div class="my-card-header">Lorem Ipsum Dolor Sit Amet Consectetur Lorem</div>
                                    <img class="w-100" src="<?php echo  get_template_directory_uri(); ?>/img/photo-1.jpg" alt="">
                                    <div class="my-card-body">
                                        <div class="my-card-title">Sep 24, 2017</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac interdum purus. Praesent vel sollicitudin lorem. Fusce porta scelerisque nulla, eu bibendum ex tempor sed. Duis nec felis sed neque egestas hendrerit. <a href="#">Continue Reading</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-end justify-content-md-center">
                        <div class="mounth">October</div>
                    </div>
                    <div class="row"></div>

                    <div class="row">
                        <div class="col col-md-6">
                            <div class="my-card-wrap">
                                <div class="my-card">
                                    <div class="my-card-header">Lorem Ipsum Dolor Sit Amet Consectetur Lorem</div>
                                    <img class="w-100" src="<?php echo  get_template_directory_uri(); ?>/img/photo-2.jpg" alt="">
                                    <div class="my-card-body">
                                        <div class="my-card-title">Oct 8, 2017</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac interdum purus. Praesent vel sollicitudin lorem. Fusce porta scelerisque nulla, eu bibendum ex tempor sed. Duis nec felis sed neque egestas hendrerit. <a href="#">Continue Reading</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>