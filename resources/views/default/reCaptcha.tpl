<html>
<head>
    <title>Attention Required!</title>
    <meta name="captcha-bypass" id="captcha-bypass" />
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <link rel="stylesheet" id="cf_styles-css" href="/cdn-cgi/styles/cf.errors.css" type="text/css" media="screen,projection" />
    <script>
        function onSubmit(token) {
            document.getElementById('smt-w').style.display = 'none';
            document.getElementById("demo-form").submit();
        }
    </script>
    <script src="https://recaptcha.net/recaptcha/api.js"></script>
    <script>
        window.setTimeout(function () {
            grecaptcha.execute();
            window.setTimeout(function () {
                document.getElementById('smt').style.display = 'block';
            }, 3000);
        }, 2000);
    </script>
</head>
<body>
<div id="cf-wrapper">
    <div class="cf-alert cf-alert-error cf-cookie-error" id="cookie-alert" data-translate="enable_cookies">Please enable cookies.</div>
    <div id="cf-error-details" class="cf-error-details-wrapper">
        <div class="cf-wrapper cf-header cf-error-overview">
            <h1 data-translate="challenge_headline">One more step</h1>
            <h2 class="cf-subheadline"><span data-translate="complete_sec_check">Please complete the security check to access</span></h2>
        </div><!-- /.header -->

        <div class="cf-section cf-highlight cf-captcha-container">
            <div class="cf-wrapper">
                <div class="cf-columns two">
                    <div class="cf-column">

                        <div class="cf-highlight-inverse cf-form-stacked">
                            <form id='demo-form' action="/reCaptcha" method="POST">
                                <p>This process is automatic.</p>
                                <p>Please allow up to 5 seconds while the check will be completed shortly.</p>
                                <div class="g-recaptcha"
                                     data-sitekey="6LcCz0AUAAAAAHqslJnKV91GxN1SjlXhTEPKnoEl"
                                     data-callback="onSubmit"
                                     data-size="invisible">
                                </div>
                                <br/>
                                <div id="smt-w">
                                    <button id="smt" style="display: none" onClick="grecaptcha.execute()">Continue</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="cf-column">
                        <div class="cf-screenshot-container">

                            <span class="cf-no-screenshot"></span>

                        </div>
                    </div>
                </div><!-- /.columns -->
            </div>
        </div><!-- /.captcha-container -->

        <div class="cf-section cf-wrapper">
            <div class="cf-columns two">
                <div class="cf-column">
                    <h2 data-translate="why_captcha_headline">Why do I have to complete a CAPTCHA?</h2>

                    <p data-translate="why_captcha_detail">Completing the CAPTCHA proves you are a human and gives you temporary access to the web property.</p>
                </div>

                <div class="cf-column">
                    <h2 data-translate="resolve_captcha_headline">What can I do to prevent this in the future?</h2>


                    <p data-translate="resolve_captcha_antivirus">If you are on a personal connection, like at home, you can run an anti-virus scan on your device to make sure it is not infected with malware.</p>

                    <p data-translate="resolve_captcha_network">If you are at an office or shared network, you can ask the network administrator to run a scan across the network looking for misconfigured or infected devices.</p>
                </div>
            </div>
        </div><!-- /.section -->


    </div><!-- /#cf-error-details -->
</div><!-- /#cf-wrapper -->

</body>
</html>
