<div style="padding-top: 20px;">
    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <!-- Otoritas Section -->
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <div class="footer_widget">
                            <h3 class="footer_title">Otoritas</h3>
                            <ul>
                                <li><a href="otoritas.php?pages=repository">Repository</a></li>
                                <li><a href="otoritas.php?pages=sisekar">SISEKAR</a></li>
                                <li><a href="otoritas.php?pages=sicantik">SICANTIK</a></li>
                                <li><a href="otoritas.php?pages=sakti">SAKTI</a></li>
                                <li><a href="otoritas.php?pages=sister">SISTER</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact Info Section -->
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <div class="footer_widget">
                            <h3 class="footer_title">Kontak Kami</h3>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-home"></i></span>
                                <div class="media-body">
                                    <h4>Kabupaten Tegal, Jawa Tengah.</h4>
                                    <p>Jl. Cut Nyak Dien No.16, Griya Prajamukti, Kalisapu, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52416</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                <div class="media-body">
                                    <h4>Telepon</h4>
                                    <p>(0283)36197570</p>
                                </div>
                            </div>
                            <!-- <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-email"></i></span>
                                <div class="media-body">
                                    <h4>support@colorlib.com</h4>
                                    <p>Send us your query anytime!</p>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- Map Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4709.440030961687!2d109.12095306743883!3d-6.991461159389069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fbef42471658d%3A0x883656d1325ef066!2sUniversitas%20Bhamada%20Slawi!5e0!3m2!1sid!2sid!4v1729062532116!5m2!1sid!2sid"
                            width="100%"
                            height="450"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visitor Counter Section -->
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <p class="copy_right">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            | FIKES UNIVERSITAS BHAMADA
                        </p>
                        <div class="icon">
                            <p>
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                Total Pengunjung Situs: <?= $counter ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- JS Here -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/ajax-form.js"></script>
<script src="js/customscript.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/scrollIt.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/nice-select.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/gijgo.min.js"></script>

<!-- Contact JS -->
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>

<script src="js/main.js"></script>
<script>
    $('#datepicker').datepicker({
        iconsLibrary: 'fontawesome',
        icons: {
            rightIcon: '<span class="fa fa-caret-down"></span>'
        }
    });
    $('#datepicker2').datepicker({
        iconsLibrary: 'fontawesome',
        icons: {
            rightIcon: '<span class="fa fa-caret-down"></span>'
        }
    });
    checkLicense();
</script>