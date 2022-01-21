<style>
   /** Counter Styles */
   .counter-box {
      display: block;
      /* background: #f6f6f6; */
      padding: 40px 20px 37px;
      text-align: center;
      margin-top: 25px;
      height: 250px;
      border-radius: 5px;
   }

   .counter-box p {
      margin: 5px 0 0;
      padding: 0;
      /* color: #909090; */
      font-size: 18px;
      font-weight: 500
   }

   .counter-box i {
      font-size: 60px;
      margin: 0 0 15px;
      /* color: #d2d2d2; */
   }

   .counter {
      display: block;
      font-size: 40px;
      font-weight: 700;
      /* color: #666; */
      margin-top: 10px;
      line-height: 28px
   }

   .counter-box.colored {
      /* background: #00FA9A; */
      border: 1px solid #142E50;
   }

   .counter-box.colored p,
   .counter-box.colored i,
   .counter-box.colored .counter {
      color: #142E50;
   }

   .counter-student-teacher-ratio {
   display: inline;
   }

   .counter-colon-str {
      font-size: 32px;
      color: #142E50;
   }

   .str-text {
      margin-top: -7px!important;
   }

   #counter-why-giccl {
      margin-top: 50px;
      margin-bottom: 50px;
   }
   .counter-text-bottom {
      font-size: 20px!important;
      font-weight: bold!important;
   }
   .why-giccl-heading {
      color: #142E50;
   }
   @media(max-width: 600px) {
      .counter {
         font-size: 32px;
      }
   }
</style>
<div class="container" id="counter-why-giccl">
    <h2 class="text-center font-weight-bold mb-3 principal-message-heading why-giccl-heading">Why GIGCCL</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="counter-box colored">
                <div>
                    <img src="assets/images/counter-icon-1.png" alt=""/>
                </div>
                <div class="mt-4">
                    <span class="counter">10500</span>
                    <p class="counter-text-bottom">Students</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="counter-box colored">
                <div>
                    <img src="assets/images/counter-icon-2.png" alt=""/>
                </div>
                <div class="mt-4">
                    <span class="counter">125</span>
                    <p class="counter-text-bottom">Faculity Members</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="counter-box colored">
                <div>
                    <img src="assets/images/counter-icon-3.png" alt=""/>
                </div>
                <div class="mt-4">
                    <span class="counter">110</span>
                    <p class="counter-text-bottom">Alumni</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class=" col-md-4">
            <div class="counter-box colored">
                <div>
                    <img src="assets/images/counter-icon-4.png" alt="" class="str-image" />
                </div>
                <div class="mt-3">
                    <span class="counter counter-student-teacher-ratio">24</span><span class="counter-colon-str">:</span><span class="counter counter-student-teacher-ratio">1</span>
                    <p class="str-text counter-text-bottom">Student-Teacher Ratio</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="counter-box colored">
                <div>
                    <img src="assets/images/counter-icon-5.png" alt=""/>
                    </div>
                <div class="mt-4">
                    <span class="counter">10</span>
                    <p class="counter-text-bottom">Societies</p>
                </div>
            </div>
        </div>
        <div class=" col-md-4">
            <div class="counter-box colored">
                <div>
                    <img src="assets/images/counter-icon-6.png" alt=""/>
                </div>
                <div class="mt-4">
                    <span class="counter">2480</span>
                    <p class="counter-text-bottom">Library Resources</p>
                </div>
            </div>
        </div>
    </div>
</div>
