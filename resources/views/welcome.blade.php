@include('header');
    <style>
        .main-banner .left-content h3{
            border-top: 1px solid #eee;
            margin-bottom: 45px;
            font-size: 60px;
            font-weight: 800;
            color: #2a2a2a;
            line-height: 72px;
            background: #FA9D4D;
            background: -webkit-linear-gradient(to right, #FA9D4D 0%, #FF4F6B 100%);
            background: -moz-linear-gradient(to right, #FA9D4D 0%, #FF4F6B 100%);
            background: linear-gradient(to right, #a4d924 0%, #000000 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .features-item .number h6{
            font-size: 20px;
        }
    </style>
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12 col-sm-12">
                    <div class="info-stat">
                      <h6>Trabalho Prático</h6>
                      <h4>Banco de dados II</h4>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <h2>Plataforma musical </h2>
                    <h3> API Vagalume</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="../img/vagalume.png" style="width: 500px;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div id="features" class="features section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="features-content">
            <div class="row">
              <div class="col-lg-4">
                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                  <div class="first-number number">
                    <h6>Música</h6>
                  </div>
                  <h4>Platao</h4>
                  <div class="line-dec"></div>
                  <h5>This HTML5 temhlate is based on Bootstrap 5 CSS. You are free to customize anything.</h5>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="features-item second-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                  <div class="second-number number">
                    <h6>Artistas</h6>
                  </div>
                  <h4>Develop a Strategy</h4>
                  <div class="line-dec"></div>
                  <p>Lorem ipsum dolor sit ameter consectetur adipiscing li elit sed do eiusmod.</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                  <div class="third-number number">
                    <h6>Albuns</h6>
                  </div>
                  <h4>Implementation</h4>
                  <div class="line-dec"></div>
                  <p>If this template is useful for your website, please consider to <a rel="nofollow" href="https://www.paypal.me/templatemo" target="_blank">support us</a> a little.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="skills-content">
            <div class="row">
                <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <br>
  @include('scripts')
