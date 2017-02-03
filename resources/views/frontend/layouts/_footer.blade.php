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
                    @component('frontend.layouts._cn_icp',['isDisplay'=>Config::get('cn.icp_display')])
                    {{ Config::get('cn.icp_id') }}
                    @endcomponent
                </li>
                <li>
                    <a href="https://m.do.co/c/05160c4ca109" target="_blank"><img src="/images/DigitalOcean.png"
                                                                                  width="120" height="25"></a>
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