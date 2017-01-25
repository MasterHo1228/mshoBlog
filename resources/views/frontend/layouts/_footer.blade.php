<footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">mshoBlog</a>
                </li>
                <li>
                    <a href="{{ route('frontend.about') }}">关于</a>
                </li>
                <li>
                    @include('frontend.layouts._cn_license_id')
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            <a href="https://github.com/MasterHo1228" target="_blank">MasterHo1228</a> &copy; , PoweredBy <a
                    href="https://laravel.com/" target="_blank">Laravel</a>. UI Designed by <a
                    href="http://www.creative-tim.com" target="_blank">Creative Tim</a>
        </div>
    </div>
</footer>