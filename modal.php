<!-- ===========================================================
        MODAL FORM FOR START A PROJECT
        =========================================================== -->

        <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
    
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold" style="font-family: Ubuntu; font-size: 36px; color: #038BB4;">Request A Project</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                <div class="modal-body mx-3">
                    <div class="md-form mb-2">
                        <label>Email:<span class="required">*</span></label>
                        <input type="email" id="defaultForm-email" class="form-control validate">
                    </div>
          
                    <div class="md-form mb-4">
                        <label for="">Full Name:<span class="required">*</span></label>
                        <input type="text" id="defaultForm-pass" class="form-control validate">
                    </div>

                    <div class="md-form mb-4">
                        <label for="">Phone Number:<span class="required">*</span></label>
                        <input type="number" id="defaultForm-pass" class="form-control validate">
                    </div>
    
                    <div class="md-form mb-4">
                        <label for="">Project type:<span class="required">*</span></label>
                        <select name="" id="defaultForm-pass" class="form-control validate">
                            <option disabled selected>Select Project Type</option>
                            <option value="">Sofware & System Automation</option>
                            <option value="">Responsive Web Development</option>
                            <option value="">Digital Signage Design & Deployment</option>
                            <option value="">Market Research & Business Intelligence</option>
                            <option value="">Corporate Brand Development</option>
                            <option value="">Multimedia Production</option>
                            <option value="">Corporate Event Production</option>
                        </select>
                    </div>
    
                    <div class="md-form mb-2">
                        <div><label for="">Project Brief:<span class="required">*</span></label></div>
                        <textarea name="" id="" cols="52" rows="5" placeholder="Please give us additional details about this Project"></textarea>
                    </div>
                    <!--GOOGLE CAPTCHA-->
                             <div class="pl-5 ml-4"><?php if( function_exists( 'gglcptch_display' ) ) { echo gglcptch_display(); } ; ?></div>
    
                    <div class="text-center">
                        <a href="" class="btn btn-lg btn-project" data-toggle="modal" data-target="#modalthankyouForm">SUBMIT PROJECT</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- ==================================
    END OF MODAL
    ================================== -->

    
    
    <!-- ===========================================================
    MODAL FORM FOR THANK YOU
     =========================================================== -->

    <div class="modal fade" id="modalthankyouForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
    
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold" style="font-family: Ubuntu; font-size: 36px; color: #038BB4;">THANK YOU!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                <div class="modal-body mx-3">
                    <p class="text-center">You Request Has Been Submitted</p>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ==================================
    END OF MODAL
    ================================== -->