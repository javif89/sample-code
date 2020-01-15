<div id="form-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0 pt-3" style="color: black;">
                <div class="text-center">
                    <h3>Start your free trial with Chroma</h3>
                    <p class="mb-0">Select your operating system</p>
                    <div class="my-3 px-lg-5 px-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="radio" name="system" value="windows" class="d-none" id="windows" checked>
                                <label for="windows" class="system-option"><i class="fab fa-windows"></i> Windows</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="radio" name="system" value="mac" class="d-none" id="mac">
                                <label for="mac" class="system-option"><i class="fab fa-apple"></i> Mac</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="hubspot-form" class="form-input-container mt-4">
                    <!--[if lte IE 8]>
                                                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                                                    <![endif]-->
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                    <script>
                        hbspt.forms.create({
                                                    	portalId: "3019581",
                                                        formId: "372fef5f-2fcf-4542-b7e4-4f0361506a8d",
                                                    });
                    </script>
                </div>
            </div>
        </div>
        <div class="mt-3 text-center">
            <button class="btn text-white m-auto text-center" data-dismiss="modal">
                <span style="font-size: 35px;" class="text-center"><i class="far fa-times-circle"></i></span> <br
                    class="">
                <span>CLOSE</span>
            </button>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const waitForEl = (selector, callback) => {
            if (jQuery(selector).length) {
            callback();
            } else {
            setTimeout(() => { waitForEl(selector, callback)}, 100);
            }
        };
        waitForEl('.hs-form', () => {
            console.log("Found you");
            $(".hs-form").removeAttr("novalidate");
            $(".hs-form").submit(function (e) {
                e.preventDefault();
                let system = document.querySelector('input[name="system"]:checked').value;
                
                if(system == 'mac') {
                    window.open("https://activegraphics.eu/download/rc/ChromaLuxeSetup.pkg");
                }
                else if(system == "windows") {
                    window.open("https://activegraphics.eu/download/rc/ChromaLuxeSetup.exe");
                }
            });
        });

    </script>
@endpush