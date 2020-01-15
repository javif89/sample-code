<div id="faq-section" class="text-left section py-5">
    <div class="container">
        <h2 class="text-white text-center mb-3">Frequently Asked Questions</h2>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mt-5">
                <div class="accordion" id="faq-accordion">
                    @component('website.product.machine.components.faq-item', ['id' => 1])
                    @slot('title')
                    What's the price point?
                    @endslot
                    <p>
                        Chroma ranges from $599 to $1,999 depending on the tier you purchase. Chroma Inspire is $599. Chroma Plus is $1,299 and
                        Chroma Luxe is $1,999.
                    </p>
                    @endcomponent

                    @component('website.product.machine.components.faq-item', ['id' => 2])
                    @slot('title')
                    Do you have financing options?
                    @endslot
                    <p>
                        Yes, you may finance Chroma Plus and Luxe with the purchase of an embroidery machine and on its own. Feel free to
                        contact us for information on financing terms.
                    </p>
                    @endcomponent
                    @component('website.product.machine.components.faq-item', ['id' => 3])
                    @slot('title')
                    What kind of training and support do I receive?
                    @endslot
                    <p>
                        Extensive video training is provided. Once you're done, you'll learn the digitizing process from start to finish, as
                        well as how to operate Chroma's special functions.
                    </p>
                    <p class="">
                        Our technical support line is open 7 days a week to answer any questions you have on the software.
                    </p>
                    @endcomponent
                    @component('website.product.machine.components.faq-item', ['id' => 4])
                    @slot('title')
                    How can I purchase Chroma?
                    @endslot
                    <p>
                        You can purchase Chroma online or via telephone with a Ricoma staff member.
                    </p>
                    @endcomponent
                    @component('website.product.machine.components.faq-item', ['id' => 5])
                    @slot('title')
                    Which Chroma tier is included in my embroidery machine package?
                    @endslot
                    <p>
                        Each embroidery machine package includes Chroma Inspire, the software's basic version that allows you to edit and create
                        simple embroidery designs. If you would like to upgrade your Chroma software, you can do so for an additional cost.
                    </p>
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>