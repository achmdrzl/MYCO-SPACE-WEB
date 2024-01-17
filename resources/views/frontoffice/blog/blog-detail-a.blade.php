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
            data-bgimage="url({{ asset('frontoffice/assets/images/background/subheader-c.jpg') }}) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <h1>Trend Aplikasi Media Belajar Online!</h1>
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

                            <img alt="" src="{{ asset('frontoffice/assets/images/blog/a/ZENIUS.png') }}"
                                class="img-fullwidth rounded">

                            <div class="post-text">
                                <p>Hai Co-Lovers lagi trend berita soal aplikasi media belajar online yang bernama Zenius telah menyatakan pamit dari layanan indonesia.</p>

                                <p>Dilansir dari media <a href="https://www.kompas.com/">KOMPAS.COM</a> platform zenius menurutp sementara layanannya di indonesia. Hal ini diumumkan perusahaan melalui pernyataan resmi pada tanggal (4/1/2023) source : <a href="https://www.kompas.com/">kompas.com</a></p>

                                <p>Dengan pernyataan ini pihak tersebut telah menutup seluruh layanan media pembelajaran online dan tidak bisa memastikan kapan perusahaan berlogo warna ungu itu bisa beroperasi kembali di indonesia</p>

                                <p>Saat ini zenius tengah mengalami tantangan yang cukup banyak, terutama di sektor operasional. Pendanaan terakhir diumumkan Zenius pada Maret 2022. Saat itu, Zenius mengumumkan pendanaan dari MDI Ventures, anak usaha dari PT Telkom Indonesia (Persero) Tbk. Modal tambahan dari MDI menambah pendanaan yang dikumpulkan Zenius sejak berdiri menjadi US$ 40 juta (Rp 622 miliar), sehingga banyaknya dana yang diperlukan dan kondisi yang masih kurang menguntungkan membuat pihak zenius mengalami beberapa kerugian</p>
                                
                                <blockquote>Kapan Zenius hadir di Indonesia ?</blockquote>

                                <p>Dikutip dari laman <a href="https://www.kompas.com/">KOMPAS.COM</a>, Zenius memulai debutnya pada tahun 2004 di Indonesia. Perusahaan ini menyediakan layanan edukasi via online di berbagai tingkat pelajar mulai dari SD, Mahasiswa hingga pelajar Professional</p>

                                <span class="post-date">Januari 16, 2024</span>
                                {{-- <span class="post-comment">1</span> --}}
                                {{-- <span class="post-like">181</span> --}}

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
                                <li><span class="date">16 Jan</span><a href="{{ route('blog.detail.a') }}">Trend Aplikasi Media Belajar Online</a></li>

                            </ul>
                        </div>
                        <div class="widget widget_tags">
                            <h4>Tags</h4>
                            <div class="small-border"></div>
                            <ul>
                                <li><a href="#link">Technology</a></li>
                                <li><a href="#link">Application</a></li>
                                <li><a href="#link">Education</a></li>
                                <li><a href="#link">Internet</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endsection
