<section id="contact">
            <div class="footer container">
                <div class="main row">
                    <div class="list col">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Terms & Cons</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Tour</a></li>
                        </ul>
                    </div>
                    <div class="list col">
                        <h4>Support</h4>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Terms & Cons</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Tour</a></li>
                        </ul>
                    </div>
                    <div class="list col">
                        <h4>Contact Info</h4>
                        <ul>
                            <li><a href="#">Jalan Raya Kubu</a></li>
                            <li><a href="#">Kubu Karangasem</a></li>
                            <li><a href="#">+62 857-3875-4536</a></li>
                            <li><a href="#">Sutravel372gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="list col">
                        <h4>Connect</h4>
                        <div class="social">
                            <a href="https://www.instagram.com/_supranatha07/"><i class='bx bxl-instagram'></i></a>
                            <a href="https://www.facebook.com/profile.php?id=100025497515898"><i class='bx bxl-facebook-circle'></i></a>
                            <a href="https://twitter.com/ArdiWidana"><i class='bx bxl-twitter'></i></a>
                            <a href="https://www.tiktok.com/@pranatha0725?lang=en"><i class='bx bxl-tiktok'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="end-text">
                <p>Copyright &#169;2024 All right reserved | Made To Finish Exam project of Web Design lecture </p>
            </div>
        </section>

        <script type="text/javascript" src="./navbar.js"></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <!-- Moment.js -->
        <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <!-- Date Range Picker JS -->
        <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script>
        $(function() {
            $('#date_range').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD'
                },
                startDate: moment(),
                endDate: moment().add(1, 'days'),
                singleDatePicker: false,
                showDropdowns: true,
                opens: 'center',
                drops: 'down',
                alwaysShowCalendars: true,
                autoApply: true,
                linkedCalendars: false,
                showCalendars: false
            }, function(start, end, label) {
                $('#date_range').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
            });
        });
        </script>

        </body>
    </html>