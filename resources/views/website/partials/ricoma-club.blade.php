<!-- Modal -->
<div class="modal fade" id="ricomaClubModal" tabindex="-1" role="dialog" aria-labelledby="ricomaClubModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="club-section">
               <div class="club-image-container">
                    <img class="img-fluid" src="{{asset('/images/Ricoma Club Desktop.png')}}" alt="">
               </div>
               <div id="club-form-container">
                   <div class="form-header">Join the Ricoma Club</div>
                   <div class="form-description">
                       Be the first to know about exclusive offers and receive exclusive content you won’t find anywhere else when you join our
                    newsletter!</div>
                   <div id="hubspot-form" class="form-input-container club-form">
                        <!--[if lte IE 8]>
                        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                        <![endif]-->
                        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                        <script>
                            hbspt.forms.create({
                        	portalId: "3019581",
                        	formId: "db3d00a5-f5d4-454e-aeb6-cd72e7443899"
                        });
                        </script>
                    </div>
               </div>
           </div>
           <div class="club-footer">
               <button type="button" class="btn close-btn" data-dismiss="modal"><i class="far fa-times-circle"></i>CLOSE</button>
           </div>
       </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(() => {
            $('.club-form').on('hsvalidatedsubmit', '.hs-form', function (e) {
                $('.form-header').html('Welcome to the Ricoma Club!');
                $('.form-description').html("Congrats! You'll now be the first to know about exclusive offers and content, so be sure to check your inbox for amazing embroidery content and promotions.");
            });
        });
    </script>
@endpush