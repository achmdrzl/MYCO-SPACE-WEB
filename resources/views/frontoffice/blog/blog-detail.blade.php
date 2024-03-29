@extends('frontoffice.layouts.main')

@push('logo-black')
    @include('frontoffice.layouts.logo-white')
@endpush

@push('header-alt')
    <header class="transparent scroll-light">
    @endpush

    @section('content')
        <!-- section begin -->
        <section id="subheader" class="text-light"
            data-bgimage="url({{ asset('frontoffice/assets/images/background/subheader.jpg') }}) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <h1>Tips to Help Boost Focus at Work</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <!-- section begin -->
        <section aria-label="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-read">

                            <img alt="" src="{{ asset('frontoffice/assets/images/news/big.jpg') }}"
                                class="img-fullwidth rounded">

                            <div class="post-text">
                                <p>Quis sunt quis do laboris eiusmod in sint dolore sit pariatur consequat commodo aliqua
                                    nulla ad dolor aliquip incididunt voluptate est aliquip adipisicing ea cupidatat nostrud
                                    incididunt aliquip dolore. Sed minim nisi duis laborum est labore nisi amet elit
                                    adipisicing proident do consectetur dolor labore sit nisi ad proident esse ad velit nisi
                                    irure reprehenderit ut et dolor labore veniam quis.</p>

                                <blockquote>Design can be art. Design can be simple. That’s why it’s so complicated. Lorem
                                    ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam.</blockquote>

                                <p>Sunt duis laboris ex et quis laborum laborum cillum mollit voluptate culpa consequat ex
                                    cupidatat dolor eiusmod proident proident cillum pariatur sint adipisicing in nostrud do
                                    dolore consectetur quis incididunt minim consectetur. Exercitation elit proident dolor
                                    est id eiusmod dolor dolor incididunt ad voluptate laboris cupidatat est est sint veniam
                                    sint officia sint incididunt est sit ut tempor commodo pariatur ut proident et do.</p>

                                <p>Sed eu in ut sint dolor irure fugiat minim veniam sed ea proident ullamco occaecat irure
                                    ut velit eu ullamco fugiat cupidatat dolore fugiat. Lorem ipsum id non deserunt id
                                    consequat duis voluptate amet aliqua pariatur laboris officia pariatur veniam velit
                                    reprehenderit sint nostrud cupidatat magna eiusmod mollit exercitation pariatur nulla
                                    minim laboris dolore aliqua consectetur cillum duis aute consectetur.</p>

                                <span class="post-date">April 1, 2018</span>
                                <span class="post-comment">1</span>
                                <span class="post-like">181</span>

                            </div>

                        </div>

                        <div class="spacer-single"></div>

                        {{-- <div id="blog-comment">
                            <h4>Comments (5)</h4>

                            <div class="spacer-half"></div>

                            <ol>
                                <li>
                                    <div class="avatar">
                                        <img src="{{ asset('frontoffice/assets/images/misc/avatar-2.jpg') }}"
                                            alt="" />
                                    </div>
                                    <div class="comment-info">
                                        <span class="c_name">John Smith</span>
                                        <span class="c_date id-color">15 January 2020</span>
                                        <span class="c_reply"><a href="#">Reply</a></span>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="comment">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                        inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</div>
                                    <ol>
                                        <li>
                                            <div class="avatar">
                                                <img src="{{ asset('frontoffice/assets/images/misc/avatar-2.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="comment-info">
                                                <span class="c_name">John Smith</span>
                                                <span class="c_date id-color">15 January 2020</span>
                                                <span class="c_reply"><a href="#">Reply</a></span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="comment">Sed ut perspiciatis unde omnis iste natus error sit
                                                voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                                                quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                explicabo.</div>
                                        </li>
                                    </ol>
                                </li>

                                <li>
                                    <div class="avatar">
                                        <img src="{{ asset('frontoffice/assets/images/misc/avatar-2.jpg') }}"
                                            alt="" />
                                    </div>
                                    <div class="comment-info">
                                        <span class="c_name">John Smith</span>
                                        <span class="c_date id-color">15 January 2020</span>
                                        <span class="c_reply"><a href="#">Reply</a></span>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="comment">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                        inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</div>
                                    <ol>
                                        <li>
                                            <div class="avatar">
                                                <img src="{{ asset('frontoffice/assets/images/misc/avatar-2.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="comment-info">
                                                <span class="c_name">John Smith</span>
                                                <span class="c_date id-color">15 January 2020</span>
                                                <span class="c_reply"><a href="#">Reply</a></span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="comment">Sed ut perspiciatis unde omnis iste natus error sit
                                                voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                                                quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                explicabo.</div>
                                        </li>
                                    </ol>
                                </li>

                                <li>
                                    <div class="avatar">
                                        <img src="{{ asset('frontoffice/assets/images/misc/avatar-2.jpg') }}"
                                            alt="" />
                                    </div>
                                    <div class="comment-info">
                                        <span class="c_name">John Smith</span>
                                        <span class="c_date id-color">15 January 2020</span>
                                        <span class="c_reply"><a href="#">Reply</a></span>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="comment">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                        inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</div>
                                </li>
                            </ol>

                            <div class="spacer-single"></div>

                            <div id="comment-form-wrapper">
                                <h4>Leave a Comment</h4>
                                <div class="comment_form_holder">
                                    <form id="contact_form" name="form1" class="form-border" method="post"
                                        action="#">

                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control" />

                                        <label>Email <span class="req">*</span></label>
                                        <input type="text" name="email" id="email" class="form-control" />
                                        <div id="error_email" class="error">Please check your email</div>

                                        <label>Message <span class="req">*</span></label>
                                        <textarea cols="10" rows="10" name="message" id="message" class="form-control"></textarea>
                                        <div id="error_message" class="error">Please check your message</div>
                                        <div id="mail_success" class="success">Thank you. Your message has been sent.
                                        </div>
                                        <div id="mail_failed" class="error">Error, email not sent</div>

                                        <p id="btnsubmit">
                                            <input type="submit" id="send" value="Send" class="btn btn-main" />
                                        </p>



                                    </form>
                                </div>
                            </div>
                        </div> --}}

                    </div>

                    <div id="sidebar" class="col-md-4">
                        <div class="widget widget-post">
                            <h4>Recent Posts</h4>
                            <div class="small-border"></div>
                            <ul>
                                <li><span class="date">10 Jun</span><a href="#">6 Make Mobile Website Faster</a>
                                </li>
                                <li><span class="date">22 Jun</span><a href="#">Experts Web Design Tips</a></li>
                                <li><span class="date">20 Jun</span><a href="#">Importance Of Web Design</a></li>
                                <li><span class="date">12 Jun</span><a href="#">Avoid These Erros In UI Design</a>
                                </li>

                            </ul>
                        </div>
                        <div class="widget widget_tags">
                            <h4>Tags</h4>
                            <div class="small-border"></div>
                            <ul>
                                <li><a href="#link">Art</a></li>
                                <li><a href="#link">Application</a></li>
                                <li><a href="#link">Design</a></li>
                                <li><a href="#link">Entertainment</a></li>
                                <li><a href="#link">Internet</a></li>
                                <li><a href="#link">Marketing</a></li>
                                <li><a href="#link">Multipurpose</a></li>
                                <li><a href="#link">Music</a></li>
                                <li><a href="#link">Print</a></li>
                                <li><a href="#link">Programming</a></li>
                                <li><a href="#link">Responsive</a></li>
                                <li><a href="#link">Website</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endsection
