<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Earlybasket</title>

  <!--   ==== ICON START ===== -->
  <link rel="stylesheet" type="text/css" href="css/et-line-font.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<i class="fa fa-wrench"></i>
  <!-- ===== ICON END ==== -->

    <!--====== Favicon Icon ======-->

    <link rel="icon" sizes="57x57" href="{{ URL::asset('public/assets/img/spa/img/favicon.png') }}">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/bootstrap.min.css') }}">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/LineIcons.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/magnific-popup.css') }}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/slick.css') }}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/animate.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/default.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/spa/style.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>

<style type="text/css">
    
    .privacy-area{

        margin-top: 120px;
        margin-bottom: 60px;
    }

</style>

<body>
    
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--====== PRELOADER PART ENDS ======-->

    <!--====== NAVBAR PART START ======-->
    <section class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ route('spa.home') }}">
                               <!--  <img src="images/logo.png" alt="Logo"> -->
                               <img src="{{ URL::asset('public/assets/img/spa/img/800x300-done2.png') }}" alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEight" aria-controls="navbarEight" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarEight">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">ABOUT</a>
                                    </li>
                                  <!--   <li class="nav-item">
                                        <a class="page-scroll" href="#portfolio">HOW IT WORKS</a>
                                    </li> -->
                                      <li class="nav-item">
                                        <a class="page-scroll" href="#how-it-works">OUR PROCESS</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#pricing"> OUR TEAM</a>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#testimonial">TESTIMONIAL</a>
                                    </li> -->
                                   
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">CONTACT</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- 
                                <div class="navbar-btn d-none mt-15 d-lg-inline-block">
                                <a class="menu-bar" href="#side-menu-right"><i class="lni-menu"></i></a>
                            </div> -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
        

    </section>
     <!--====== NAVBAR PART END ======-->
    
     <!--====== PRIVACY PART START ======-->

    <section id="privacy" class="privacy-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">TERMS AND CONDITIONS</h3>
                    <p>Last updated: 2020-11-23</p><br>
                    <h4>1. Introduction</h4>
                    <p>Welcome to EARLY BASKET (???Company???, ???we???, ???our???, ???us???)!</p>
                    <p>These Terms of Service (???Terms???, ???Terms of Service???) govern your use of our website located at earlybasket.com (together or individually ???Service???) operated by EARLY BASKET.</p>
                    <p>Our Privacy Policy also governs your use of our Service and explains how we collect, safeguard and disclose information that results from your use of our web pages.</p>
                    <p>Your agreement with us includes these Terms and our Privacy Policy (???Agreements???). You acknowledge that you have read and understood Agreements, and agree to be bound of them.</p>
                    <p>If you do not agree with (or cannot comply with) Agreements, then you may not use the Service, but please let us know by emailing at support@earlybasket.com so we can try to find a solution. These Terms apply to all visitors,</p>
                    <p>users and others who wish to access or use Service.</p>
                    <h4>2. Communications</h4>
                    <p>By using our Service, you agree to subscribe to newsletters, marketing or promotional materials and other information we may send. However, you may opt out of receiving any, or all, of these communications from us by following the unsubscribe link or by emailing at support@earlybasket.com.</p>
                    <h4>3. Purchases</h4>
                    <p>If you wish to purchase any product or service made available through Service (???Purchase???), you may be asked to supply certain information relevant to your Purchase including but not limited to, your credit or debit card number, the expiration date of your card, your billing address, and your shipping information.</p>
                    <p>You represent and warrant that: (i) you have the legal right to use any card(s) or other payment method(s) in connection with any Purchase; and that (ii) the information you supply to us is true, correct and complete.</p>
                    <p>We may employ the use of third party services for the purpose of facilitating payment and the completion of Purchases. By submitting your information, you grant us the right to provide the information to these third parties subject to our Privacy Policy.</p>
                    <p>We reserve the right to refuse or cancel your order at any time for reasons including but not limited to: product or service availability, errors in the description or price of the product or service, error in your order or other reasons.</p>
                    <p>We reserve the right to refuse or cancel your order if fraud or an unauthorized or illegal transaction is suspected.</p>

                    <h4>4. Contests, Sweepstakes and Promotions</h4>
                    <p>Any contests, sweepstakes or other promotions (collectively, ???Promotions???) made available through Service may be governed by rules that are separate from these Terms of Service. If you participate in any Promotions, please review the applicable rules as well as our Privacy Policy. If the rules for a Promotion conflict with these Terms of Service, Promotion rules will apply.</p>

                    <h4>5. Subscriptions</h4>
                    <p>Some parts of Service are billed on a subscription basis ("Subscription(s)"). You will be billed in advance on a recurring and periodic basis ("Billing Cycle"). Billing cycles will be set depending on the type of subscription plan you select when purchasing a Subscription.</p>

                    <p>At the end of each Billing Cycle, your Subscription will automatically renew under the exact same conditions unless you cancel it or EARLY BASKET cancels it. You may cancel your Subscription renewal either through your online account management page or by contacting support@earlybasket.com customer support team.</p>

                    <p>A valid payment method is required to process the payment for your subscription. You shall provide EARLY BASKET with accurate and complete billing information that may include but not limited to full name, address, state, postal or zip code, telephone number, and a valid payment method information. By submitting such payment information, you automatically authorize EARLY BASKET to charge all Subscription fees incurred through your account to any such payment instruments.</p>

                    <p>Should automatic billing fail to occur for any reason, EARLY BASKET reserves the right to terminate your access to the Service with immediate effect.</p>

                    <h4>6. Free Trial</h4>
                    <p>EARLY BASKET may, at its sole discretion, offer a Subscription with a free trial for a limited period of time ("Free Trial").</p>
                    <p>You may be required to enter your billing information in order to sign up for Free Trial.</p>
                    <p>If you do enter your billing information when signing up for Free Trial, you will not be charged by EARLY BASKET until Free Trial has expired. On the last day of Free Trial period, unless you cancelled your Subscription, you will be automatically charged the applicable Subscription fees for the type of Subscription you have selected.</p>
                    <p>At any time and without notice, EARLY BASKET reserves the right to (i) modify Terms of Service of Free Trial offer, or (ii) cancel such Free Trial offer.</p>

                    <h4>7. Fee Changes</h4>
                    <p>EARLY BASKET, in its sole discretion and at any time, may modify Subscription fees for the Subscriptions. Any Subscription fee change will become effective at the end of the then-current Billing Cycle.</p>
                    <p>EARLY BASKET will provide you with a reasonable prior notice of any change in Subscription fees to give you an opportunity to terminate your Subscription before such change becomes effective.</p>
                    <p>Your continued use of Service after Subscription fee change comes into effect constitutes your agreement to pay the modified Subscription fee amount.</p>
                    <h4>8. Refunds</h4>
                    <p>We issue refunds for Contracts within 1 days of the original purchase of the Contract.</p>
                    <h4>9. Content</h4>
                    <p>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (???Content???). You are responsible for Content that you post on or through Service, including its legality, reliability, and appropriateness.</p>
                    <p>By posting Content on or through Service, You represent and warrant that: (i) Content is yours (you own it) and/or you have the right to use it and the right to grant us the rights and license as provided in these Terms, and (ii) that the posting of your Content on or through Service does not violate the privacy rights, publicity rights, copyrights, contract rights or any other rights of any person or entity. We reserve the right to terminate the account of anyone found to be infringing on a copyright.</p>
                    <p>You retain any and all of your rights to any Content you submit, post or display on or through Service and you are responsible for protecting those rights. We take no responsibility and assume no liability for Content you or any third party posts on or through Service. However, by posting Content using Service you grant us the right and license to use, modify, publicly perform, publicly display, reproduce, and distribute such Content on and through Service. You agree that this license includes the right for us to make your Content available to other users of Service, who may also use your Content subject to these Terms.</p>
                    <p>EARLY BASKET has the right but not the obligation to monitor and edit all Content provided by users.</p>
                    <p>In addition, Content found on or through this Service are the property of EARLY BASKET or used with permission. You may not distribute, modify, transmit, reuse, download, repost, copy, or use said Content, whether in whole or in part, for commercial purposes or for personal gain, without express advance written permission from us.</p>
                    <h4>10. Prohibited Uses</h4>
                    <p>You may use Service only for lawful purposes and in accordance with Terms. You agree not to use Service:</p>
                    <p>1. In any way that violates any applicable national or international law or regulation.</p>
                    <p>2. For the purpose of exploiting, harming, or attempting to exploit or harm minors in any way by exposing them to inappropriate content or otherwise.</p>
                    <p>3. To transmit, or procure the sending of, any advertising or promotional material, including any ???junk mail???, ???chain letter,??? ???spam,??? or any other similar solicitation.</p>
                    <p>4. To impersonate or attempt to impersonate Company, a Company employee, another user, or any other person or entity.</p>
                    <p>5. In any way that infringes upon the rights of others, or in any way is illegal, threatening, fraudulent, or harmful, or in connection with any unlawful, illegal, fraudulent, or harmful purpose or activity.</p>
                    <p>6. To engage in any other conduct that restricts or inhibits anyone???s use or enjoyment of Service, or which, as determined by us, may harm or offend Company or users of Service or expose them to liability.</p>
                    <p>Additionally, you agree not to:</p>
                    <p>1. Use Service in any manner that could disable, overburden, damage, or impair Service or interfere with any other party???s use of Service, including their ability to engage in real time activities through Service.</p>
                    <p>2. Use any robot, spider, or other automatic device, process, or means to access Service for any purpose, including monitoring or copying any of the material on Service.</p>
                    <p>3. Use any manual process to monitor or copy any of the material on Service or for any other unauthorized purpose without our prior written consent.</p>
                    <p>4. Use any device, software, or routine that interferes with the proper working of Service.</p>
                    <p>5. Introduce any viruses, trojan horses, worms, logic bombs, or other material which is malicious or technologically harmful.</p>
                    <p>6. Attempt to gain unauthorized access to, interfere with, damage, or disrupt any parts of Service, the server on which Service is stored, or any server, computer, or database connected to Service.</p>
                    <p>7. Attack Service via a denial-of-service attack or a distributed denial-of-service attack.</p>
                    <p>8. Take any action that may damage or falsify Company rating.</p>
                    <p>9. Otherwise attempt to interfere with the proper working of Service.</p>
                    <h4>11. Analytics</h4>
                    <p>We may use third-party Service Providers to monitor and analyze the use of our Service.</p>
                    <h4>12. No Use By Minors</h4>
                    <p>Service is intended only for access and use by individuals at least eighteen (18) years old. By accessing or using Service, you warrant and represent that you are at least eighteen (18) years of age and with the full authority, right, and capacity to enter into this agreement and abide by all of the terms and conditions of Terms. If you are not at least eighteen (18) years old, you are prohibited from both the access and usage of Service.</p>
                    <h4>13. Accounts</h4>
                    <p>When you create an account with us, you guarantee that you are above the age of 18, and that the information you provide us is accurate, complete, and current at all times. Inaccurate, incomplete, or obsolete information may result in the immediate termination of your account on Service.</p>
                    <p>You are responsible for maintaining the confidentiality of your account and password, including but not limited to the restriction of access to your computer and/or account. You agree to accept responsibility for any and all activities or actions that occur under your account and/or password, whether your password is with our Service or a third-party service. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>
                    <p>You may not use as a username the name of another person or entity or that is not lawfully available for use, a name or trademark that is subject to any rights of another person or entity other than you, without appropriate authorization. You may not use as a username any name that is offensive, vulgar or obscene.</p>
                    <p>We reserve the right to refuse service, terminate accounts, remove or edit content, or cancel orders in our sole discretion.</p>

                    <h4>14. Intellectual Property</h4>
                    <p>Service and its original content (excluding Content provided by users), features and functionality are and will remain the exclusive property of EARLY BASKET and its licensors. Service is protected by copyright, trademark, and other laws of and foreign countries. Our trademarks may not be used in connection with any product or service without the prior written consent of EARLY BASKET.</p>

                    <h4>15. Copyright Policy</h4>
                    <p>We respect the intellectual property rights of others. It is our policy to respond to any claim that Content posted on Service infringes on the copyright or other intellectual property rights (???Infringement???) of any person or entity.</p>
                    <p>If you are a copyright owner, or authorized on behalf of one, and you believe that the copyrighted work has been copied in a way that constitutes copyright infringement, please submit your claim via email to support@earlybasket.com, with the subject line: ???Copyright Infringement??? and include in your claim a detailed description of the alleged Infringement as detailed below, under ???DMCA Notice and Procedure for Copyright Infringement Claims???</p>
                    <p>You may be held accountable for damages (including costs and attorneys??? fees) for misrepresentation or bad-faith claims on the infringement of any Content found on and/or through Service on your copyright.</p>

                    <h4>16. DMCA Notice and Procedure for Copyright Infringement Claims</h4>
                    <p>You may submit a notification pursuant to the Digital Millennium Copyright Act (DMCA) by providing our Copyright Agent with the following information in writing (see 17 U.S.C 512(c)(3) for further detail):</p>
                    <ul>
                        <li>1. an electronic or physical signature of the person authorized to act on behalf of the owner of the copyright???s interest;</li>
                        <li>2. a description of the copyrighted work that you claim has been infringed, including the URL (i.e., web page address) of the location where the copyrighted work exists or a copy of the copyrighted work;</li>
                        <li>3. identification of the URL or other specific location on Service where the material that you claim is infringing is located;</li>
                        <li>4. your address, telephone number, and email address;</li>
                        <li>5. a statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law;</li>
                        <li>6. a statement by you, made under penalty of perjury, that the above information in your notice is accurate and that you are the copyright owner or authorized to act on the copyright owner???s behalf.</li>
                    </ul>
                    <p>You can contact our Copyright Agent via email at support@earlybasket.com.</p>

                    <h4>17. Error Reporting and Feedback</h4>
                    <p>You may provide us either directly at support@earlybasket.com or via third party sites and tools with information and feedback concerning errors, suggestions for improvements, ideas, problems, complaints, and other matters related to our Service (???Feedback???). You acknowledge and agree that: (i) you shall not retain, acquire or assert any intellectual property right or other right, title or interest in or to the Feedback; (ii) Company may have development ideas similar to the Feedback; (iii) Feedback does not contain confidential information or proprietary information from you or any third party; and (iv) Company is not under any obligation of confidentiality with respect to the Feedback. In the event the transfer of the ownership to the Feedback is not possible due to applicable mandatory laws, you grant Company and its affiliates an exclusive, transferable, irrevocable, free-of-charge, sub-licensable, unlimited and perpetual right to use (including copy, modify, create derivative works, publish, distribute and commercialize) Feedback in any manner and for any purpose.</p>
                    <h4>18. Links To Other Web Sites</h4>
                    <p>Our Service may contain links to third party web sites or services that are not owned or controlled by EARLY BASKET.</p>
                    <p>EARLY BASKET has no control over, and assumes no responsibility for the content, privacy policies, or practices of any third party web sites or services. We do not warrant the offerings of any of these entities/individuals or their websites.</p>
                    <p>For example, the outlined Terms of Use have been created using PolicyMaker.io, a free web application for generating high-quality legal documents. PolicyMaker???s Terms and Conditions generator is an easy-to-use free tool for creating an excellent standard Terms of Service template for a website, blog, e-commerce store or app.</p>
                    <p>YOU ACKNOWLEDGE AND AGREE THAT COMPANY SHALL NOT BE RESPONSIBLE OR LIABLE, DIRECTLY OR INDIRECTLY, FOR ANY DAMAGE OR LOSS CAUSED OR ALLEGED TO BE CAUSED BY OR IN CONNECTION WITH USE OF OR RELIANCE ON ANY SUCH CONTENT, GOODS OR SERVICES AVAILABLE ON OR THROUGH ANY SUCH THIRD PARTY WEB SITES OR SERVICES.</p>
                    <p>WE STRONGLY ADVISE YOU TO READ THE TERMS OF SERVICE AND PRIVACY POLICIES OF ANY THIRD PARTY WEB SITES OR SERVICES THAT YOU VISIT.</p>
                    <h4>19. Disclaimer Of Warranty</h4>
                    <p>THESE SERVICES ARE PROVIDED BY COMPANY ON AN ???AS IS??? AND ???AS AVAILABLE??? BASIS. COMPANY MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND, EXPRESS OR IMPLIED, AS TO THE OPERATION OF THEIR SERVICES, OR THE INFORMATION, CONTENT OR MATERIALS INCLUDED THEREIN. YOU EXPRESSLY AGREE THAT YOUR USE OF THESE SERVICES, THEIR CONTENT, AND ANY SERVICES OR ITEMS OBTAINED FROM US IS AT YOUR SOLE RISK.</p>
                    <p>NEITHER COMPANY NOR ANY PERSON ASSOCIATED WITH COMPANY MAKES ANY WARRANTY OR REPRESENTATION WITH RESPECT TO THE COMPLETENESS, SECURITY, RELIABILITY, QUALITY, ACCURACY, OR AVAILABILITY OF THE SERVICES. WITHOUT LIMITING THE FOREGOING, NEITHER COMPANY NOR ANYONE ASSOCIATED WITH COMPANY REPRESENTS OR WARRANTS THAT THE SERVICES, THEIR CONTENT, OR ANY SERVICES OR ITEMS OBTAINED THROUGH THE SERVICES WILL BE ACCURATE, RELIABLE, ERROR-FREE, OR UNINTERRUPTED, THAT DEFECTS WILL BE CORRECTED, THAT THE SERVICES OR THE SERVER THAT MAKES IT AVAILABLE ARE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS OR THAT THE SERVICES OR ANY SERVICES OR ITEMS OBTAINED THROUGH THE SERVICES WILL OTHERWISE MEET YOUR NEEDS OR EXPECTATIONS.</p>
                    <p>COMPANY HEREBY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, STATUTORY, OR OTHERWISE, INCLUDING BUT NOT LIMITED TO ANY WARRANTIES OF MERCHANTABILITY, NON-INFRINGEMENT, AND FITNESS FOR PARTICULAR PURPOSE.</p>
                    <p>THE FOREGOING DOES NOT AFFECT ANY WARRANTIES WHICH CANNOT BE EXCLUDED OR LIMITED UNDER APPLICABLE LAW.</p>
                    <h4>20. Limitation Of Liability</h4>
                    <p>EXCEPT AS PROHIBITED BY LAW, YOU WILL HOLD US AND OUR OFFICERS, DIRECTORS, EMPLOYEES, AND AGENTS HARMLESS FOR ANY INDIRECT, PUNITIVE, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGE, HOWEVER IT ARISES (INCLUDING ATTORNEYS??? FEES AND ALL RELATED COSTS AND EXPENSES OF LITIGATION AND ARBITRATION, OR AT TRIAL OR ON APPEAL, IF ANY, WHETHER OR NOT LITIGATION OR ARBITRATION IS INSTITUTED), WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE, OR OTHER TORTIOUS ACTION, OR ARISING OUT OF OR IN CONNECTION WITH THIS AGREEMENT, INCLUDING WITHOUT LIMITATION ANY CLAIM FOR PERSONAL INJURY OR PROPERTY DAMAGE, ARISING FROM THIS AGREEMENT AND ANY VIOLATION BY YOU OF ANY FEDERAL, STATE, OR LOCAL LAWS, STATUTES, RULES, OR REGULATIONS, EVEN IF COMPANY HAS BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. EXCEPT AS PROHIBITED BY LAW, IF THERE IS LIABILITY FOUND ON THE PART OF COMPANY, IT WILL BE LIMITED TO THE AMOUNT PAID FOR THE PRODUCTS AND/OR SERVICES, AND UNDER NO CIRCUMSTANCES WILL THERE BE CONSEQUENTIAL OR PUNITIVE DAMAGES. SOME STATES DO NOT ALLOW THE EXCLUSION OR LIMITATION OF PUNITIVE, INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THE PRIOR LIMITATION OR EXCLUSION MAY NOT APPLY TO YOU.</p>
                    <h4>21. Termination</h4>
                    <p>We may terminate or suspend your account and bar access to Service immediately, without prior notice or liability, under our sole discretion, for any reason whatsoever and without limitation, including but not limited to a breach of Terms.</p>
                    <p>If you wish to terminate your account, you may simply discontinue using Service.</p>
                    <p>All provisions of Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>
                    <h4>22. Governing Law</h4>
                    <p>These Terms shall be governed and construed in accordance with the laws of INDIA,HARYANA,GURGAON, which governing law applies to agreement without regard to its conflict of law provisions.</p>
                    <p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service and supersede and replace any prior agreements we might have had between us regarding Service.</p>
                    <h4>23. Changes To Service</h4>
                    <p>We reserve the right to withdraw or amend our Service, and any service or material we provide via Service, in our sole discretion without notice. We will not be liable if for any reason all or any part of Service is unavailable at any time or for any period. From time to time, we may restrict access to some parts of Service, or the entire Service, to users, including registered users.</p>
                    <h4>24. Amendments To Terms</h4>
                    <p>We may amend Terms at any time by posting the amended terms on this site. It is your responsibility to review these Terms periodically.</p>
                    <p>Your continued use of the Platform following the posting of revised Terms means that you accept and agree to the changes. You are expected to check this page frequently so you are aware of any changes, as they are binding on you.</p>
                    <p>By continuing to access or use our Service after any revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, you are no longer authorized to use Service.</p>
                    <h4>25. Waiver And Severability</h4>
                    <p>No waiver by Company of any term or condition set forth in Terms shall be deemed a further or continuing waiver of such term or condition or a waiver of any other term or condition, and any failure of Company to assert a right or provision under Terms shall not constitute a waiver of such right or provision.</p>
                    <p>If any provision of Terms is held by a court or other tribunal of competent jurisdiction to be invalid, illegal or unenforceable for any reason, such provision shall be eliminated or limited to the minimum extent such that the remaining provisions of Terms will continue in full force and effect.</p>
                    <h4>26. Acknowledgement</h4>
                    <p>BY USING SERVICE OR OTHER SERVICES PROVIDED BY US, YOU ACKNOWLEDGE THAT YOU HAVE READ THESE TERMS OF SERVICE AND AGREE TO BE BOUND BY THEM.</p>
                    <h4>27. Contact Us</h4>
                    <p>Please send your feedback, comments, requests for technical support by email: support@earlybasket.com.</p>
                    <p>These Terms of Service were created by earlybasket.com on 2020-11-23.</p>
                </div>
            </div>
        </div> <!-- container -->
    </section>

    <!--====== PRIVACY PART ENDS ======-->
   
    <!--====== FOOTER FOUR PART START ======-->

    <footer id="footer" class="footer-area">
        <div class="footer-widget bb-solid-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">About</h6>
                            <p class="text-justify pt-3">
                               earlybasket.com (Innovative Retail Concepts India Private Limited) is Delhi NCR  largest online & offline food and grocery store. With over 18,000 products and over a 1000 brands in our catalogue you will find everything you are looking for. 
                            </p>
                           <!--  <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Profile</a></li>
                            </ul> -->
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6 margin-left">
                        <div class="footer-link">
                            <h6 class="footer-title">Popular Categories</h6>
                            <ul>
                                <li><a href="#">Health Drinks</a></li>
                                <li><a href="#">Wheat Atta</a></li>
                                <li><a href="#">Diapers & Wipes</a></li>
                                <li><a href="#">Sunflower Oil</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6 margin-left">
                        <div class="footer-link">
                            <h6 class="footer-title">Important Links</h6>
                            <ul>
                                <li><a href="{{ route('spa.privacy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('spa.terms') }}">Terms & Conditions</a></li>
                                <li><a href="{{ route('spa.disclaimer') }}">Disclaimer</a></li>
                                <!-- <li><a href="#">Bru</a></li> -->
                                <li><a href="{{ route('spa.refund') }}">Return and Refund Policy</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Visit Our Store</h6>
                            <!-- <ul>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul> -->
                            <ul>
                                <p class="text-footer"><i class="fa fa-map-signs fw pr-1"></i>Shop No-10 & 11,Suncity Avenue,Sector-102,Gurgaon,Haryana,122001</p>
                                <li class="text-justify"><i class="fa fa-phone pr-1"></i><a href="tel:918008271800">    Call Now (+91) 800-8271-800</a></li>
                                <!-- <li><i class="fa fa-phone pr-2"></i><a href="tel:1800-212-3667">Toll Free No : 1800-212-3667</a></li> -->
                                <li><i class="fa fa-phone pr-1"></i><a href="tel:0124-793-7177">  Phone No : 0124-793-7177</a></li>
                               <!--  <li class="text-justify"><i class="fab fa-whatsapp pr-2"></i><a href="https://api.whatsapp.com/send?phone=918008271800" target="_blank">(+91) 800-8271-800</a></li> -->
                                <li><i class="fa fa-envelope pr-1"></i><a href="mailto:contactus@earlybasket.com" target="_blank"> support@earlybasket.com</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        
        <div class="footer-copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="copyright text-center text-lg-left mt-10">
                            <p class="text">Copyright ?? 2021 All Rights Reserved By <a style="color: #d11f2f" rel="nofollow" href="https://earlybasket.com/" target="_blank">Early Basket</a></p>
                        </div> <!--  copyright -->
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-logo text-center mt-10">
                            <!-- <a href="index.html"><img src="images/logo-2.svg" alt="Logo"></a> -->
                            <a href="{{ route('spa.home') }}"><img src="{{ URL::asset('public/assets/img/spa/img/favicon.png') }}" alt="Logo"></a>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-5">
                        <ul class="social text-center text-lg-right mt-10">
                            <li><a href="https://www.facebook.com/earlybasketapp/"><i class="lni-facebook-filled"></i></a></li>
                            <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                            <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                            <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                        </ul> <!-- social -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER FOUR PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->  

   
    <!--====== jquery js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/spa/vendor/jquery-1.12.4.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/spa/popper.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/slick.min.js') }}"></script>

    <!--====== Isotope js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/isotope.pkgd.min.js') }}"></script>

    <!--====== Images Loaded js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/imagesloaded.pkgd.min.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Scrolling js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/scrolling-nav.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/spa/jquery.easing.min.js') }}"></script>

    <!--====== wow js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/wow.min.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ URL::asset('public/assets/js/spa/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script type="text/javascript">

    @if(Session::has('message'))

          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
          toastr.success("{{ session('message') }}");

    @endif

    </script>

</body>

</html>
