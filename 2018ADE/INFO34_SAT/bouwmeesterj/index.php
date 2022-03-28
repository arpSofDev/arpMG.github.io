<?php include 'templates/header.php'; ?>
    <body data-spy="scroll" data-target="#menu">
        <div id="home">
            <div class="landing-text">
                <h1 class="display-1">BITCOIN</h1>
                <h3>An investigation.</h3>

                <a href="#intro" class="btn_anim">
                    <svg width="277" height="62">
                      <defs>
                          <linearGradient id="grad1">
                              <stop offset="0%" stop-color="#FF8282"/>
                              <stop offset="100%" stop-color="#E178ED" />
                          </linearGradient>
                      </defs>
                       <rect x="5" y="5" rx="25" fill="none" stroke="url(#grad1)" width="266" height="50"></rect>
                    </svg>
                      <span>Let's go</span>
                </a>
            </div>
        </div>
        <div id="intro"></div>
        <?php include 'templates/nav.php'; ?>

        <!-- Section 1: Introduction -->
        <section class="section_blue ss-style-triangles">
          <div class="padding">

            <div class="container" id="introduction">

                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <h2>Introduction</h2>

                        <p class="lead"><span class="font-italic">What is Bitcoin?</span><br>
                            Bitcoin is a cryptocurrency, which is a form of a digital asset.
                            If you own a bitcoin, what you actually own is a secret digital key that
                            proves to the bitcoin network that you own a bitcoin. In some way, the key
                            is like a password that grants access to your bitcoins. That means that
                            if anyone gets your key, they have total control over all your money. </p>

                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                      <div class="mx-auto text-center">
                        <img src="img/bitcoin_logo.png" alt="Bitcoin Logo" class="img-responsive col-8 mx-auto">
                      </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p class="lead"><span class="font-italic">How does Bitcoin work?</span><br>
                            Bitcoins are transferred from one wallet to another through transactions.
                            These transactions are broadcast to the network, and get confirmed by
                            miners soon after. If a transaction is confirmed, it gets stored in the block chain,
                            a public shared ledger that contains a record of all transactions. This
                            ledger is decentralised and exists through the connection of a large number
                            of computers.
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p class="lead"><span class="font-italic">Where do bitcoins come from?</span><br>
                            Bitcoins are obtained through a process called mining. Bitcoin, like gold or
                            any other natural resource, only has a finite amount ever available. As more
                            bitcoins get mined, there are fewer available for mining, making them rarer
                            and harder to mine. Miners are actually computers dedicated to solving complex
                            mathematical algorithms in order to approve and append transactions to the block
                            chain. If a miner completes an algorithm, they are rewarded with bitcoins.
                        </p>
                    </div>
                </div>
                <br><br><br>
                <div class="row">
                    <p class="lead">As the number of transactions increases the block chain, the number of
                      miners increases, and so does the complexity of the algorithms. This means that as
                      more investors buy into Bitcoin, less miners will be awarded Bitcoins, making the
                      supply of Bitcoin lower, ultimately increasing the price.</p>

                      <p class="lead">From this, I hypothesised that...<br>
                            <div id="hypothesis" class="col-10 mx-auto border border-light border-right-0 border-left-0"><p class="lead">Due to the volatile nature of the price of bitcoins, people consider
                            them to be an asset as opposed to a form of currency. As such, less
                            people will invest if the price of bitcoin continues to rise.</p>
                            </div>
                      </p>


                </div>

            </div>

          </div>
        </section>  <!-- end Section 1: Introduction -->

        <!-- Section 2: Bitcoin over time -->
        <section class="section section_white ss-style-triangles" id="link2">

          <div class="padding">
              <div class="container">
                  <div class="d-flex justify-content-around">
                      <div class=""><h2>Bitcoin over time</h2></div>
                      <div class=""></div>
                      <div class="">
                          <a class="top-link-blue" href="#intro">Back to top</a>
                      </div>
                  </div>
                  <br><br>
                  <div class="col-9 mx-auto">

                      <p class="lead">Since its creation in 2009, the price of Bitcoin has been
                         on a steady increase, with the exception of a few drastic rises and
                         falls. From my research, a fairly strong indicator of Bitcoin price
                         is media attention and public interest. As such, the Bitcoin price
                         appears to fluctuate in a cycle consisting of 5 stages, which seem to
                         be directly linked to its prevalence in the media:</p>

                      <ol class="lead col-10 mx-auto">
                         <li class="">Steady and gradual increase in price as genuine investors
                           purchase bitcoin for potential technological advancements and
                           long-term profit.</li>
                         <li class="">Media reports on rising Bitcoin prices attracts high levels
                           of public interest and lures everyday citizens into the market.
                           Long-term investors make profit by selling Bitcoin at a high price
                           to eager buyers. This causes a dramatic rise in the price of bitcoin.</li>
                         <li class="">Price reaches a high but very short-lived peak.</li>
                         <li class="">After the initial excitement and frenzy of media attention
                           wears off, short-term investors begin selling for fear of a crash.</li>
                         <li class="">This idea spreads, and once the price begins to descend,
                           even more investors start withdrawing, leading to a large crash in the
                           Bitcoin price.</li>
                      </ol>

                      <p class="lead">
                          This cycle has occurred multiple times throughout the history of Bitcoin,
                          with the most significant being in December 2017. As seen in the graph below,
                          there is a clear correlation between public interest and Bitcoin price, as
                          the Google search popularity (blue line) almost identically follows the same
                          trend as the Bitcoin price (red line).
                      </p>
                  </div>
                  <div class="mx-auto">
                      <div class="mx-auto" style="width:75%;">
                         <canvas id="line"></canvas>
                      </div>
                      <br>
                      <p class="lead col-10 mx-auto">
                          Based on this trend, I predict that the price of Bitcoin will continue to
                          fluctuate in the same cycle, but will ultimately maintain its steady increase
                          over time. I believe that the magnitude of these fluctuations will gradually
                          increase, as the influence of the media will become more widespread and focused
                          on the implementation of future technologies.
                      </p>
                  </div>
                  <hr>
                  <div class="col-10 mx-auto">
                      <h2>Major events</h2>
                      <div class="mx-auto">
                          <ul class="list-group list-group-flush lead">
                              <li class="list-group-item"><span class="text-success">+25.4% | Bitcoin upgrade | 20th July, 2017</span><br>A meeting between Bitcoin startup executives and miners resulted in an agreement to upgrade the project and support additional transaction capacity.</li>
                              <li class="list-group-item"><span class="text-danger">-14.2% | China shuts down Bitcoin | 15th September, 2017</span><br>Chinese authorities announce their plan to shut down Bitcoin and order Beijing-based exchanges to cease trading immediately and notify users of their closure.</li>
                              <li class="list-group-item"><span class="text-danger">-16.7% | Dimon critiques Bitcoin | 12th September, 2017</span><br>Jamie Dimon, CEO of American multinational investment bank and financial services company, JPMorgan Chase, expresses his beliefs of Bitcoin. He stated that he would fire any employee trading Bitcoin for being “stupid”, and exclaimed that the cryptocurrency is a “fraud” and “won’t end well”.</li>
                              <li class="list-group-item"><span class="text-success">+14.5% | Hard fork | 5th August, 2017</span><br>Bitcoin splits into Bitcoin and Bitcoin Cash. This is known as a ‘hard fork’, and split the Bitcoin ledger in two, ultimately increasing the Bitcoin block size limit.</li>
                              <li class="list-group-item"><span class="text-danger">-16.5% | Mike Hearn quits Bitcoin | 14th January, 2016</span><br>Mike Hearn declares he will “no longer be taking part in Bitcoin development”. Hearn, a former Google engineer who was heavily involved in the Bitcoin community since the beginning of the cryptocurrency, announced that Bitcoin “has failed” because the “fundamentals are broken”. </li>
                          </ul>
                          <br><br>
                          <p class="col-12 lead mx-auto">In an investigation by the American Institute for Economic Research (AIER), Bitcoin’s 50 largest price changes were analysed and the results are summarised in the table below. The corresponding news events were categorised into eight categories to demonstrate which news events have the largest impact on Bitcoin’s price.</p>
                          <div class="mx-auto text-center">
                              <p class="lead">Main news events that contribute to Bitcoin price fluctuations.</p>

                          </div>
                          <table class="table table-hover table-bordered">

                              <thead>
                                  <tr>
                                      <th scope="col">Category</th>
                                      <th scope="col"># Observations</th>
                                      <th scope="col">Mean % change (abs.)</th>
                                      <th scope="col">Max % change (abs.)</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td class="left">Changes in Bitcoin structure</td>
                                      <td>8</td>
                                      <td>12.779</td>
                                      <td>25.409</td>
                                  </tr>
                                  <tr>
                                      <td class="left">Personal opinions</td>
                                      <td>6</td>
                                      <td>8.726</td>
                                      <td>16.513</td>
                                  </tr>
                                  <tr>
                                      <td class="left">Government regulations</td>
                                      <td>12</td>
                                      <td>8.092</td>
                                      <td>14.236</td>
                                  </tr>
                                  <tr>
                                      <td class="left">News about other currencies</td>
                                      <td>7</td>
                                      <td>9.311</td>
                                      <td>10.980</td>
                                  </tr>
                                  <tr>
                                      <td class="left">New investment opportunities</td>
                                      <td>7</td>
                                      <td>7.114</td>
                                      <td>8.763</td>
                                  </tr>
                                  <tr>
                                      <td class="left">Bitcoin/exchanges under investigation</td>
                                      <td>2</td>
                                      <td>6.449</td>
                                      <td>6.911</td>
                                  </tr>
                                  <tr>
                                      <td class="left">Cybersecurity news</td>
                                      <td>3</td>
                                      <td>8.449</td>
                                      <td>9.301</td>
                                  </tr>
                                  <tr>
                                      <td class="left">No news found</td>
                                      <td>9</td>
                                      <td>7.090</td>
                                      <td>10.742</td>
                                  </tr>
                              </tbody>
                          </table>
                          <div class="d-flex justify-content-around">
                              <div class=""><p class="lead">abs. - absolute value</p></div>
                              <div class=""></div>
                              <div class="">
                                  <p><a class="text-right lead" target="_blank" href="https://www.aier.org/article/bitcoins-largest-price-changes-coincide-major-news-events-about-cryptocurrency">AIER investigation</a></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>


        </section> <!-- end Section 2: Bitcoin over time -->

        <!-- Section 3: Asset vs Currency -->
        <section class="section_blue ss-style-triangles" id="link3">
          <div class="padding">
            <div class="container">
                <div class="d-flex justify-content-around">
                    <div class=""><h2>Asset vs Currency</h2></div>
                    <div class=""></div>
                    <div class="">
                        <a class="top-link-white" href="#intro">Back to top</a>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p class="lead">
                        An asset is defined as a tangible or intangible item of property that
                        holds a value and is owned by an individual or company. A currency is
                        generally a form of money issued by a government and circulated within
                        an economy which can be exchanged for goods or services. As such, Bitcoin
                        can be thought of as both an asset and a currency, as it exhibits qualities
                        from both these definitions.
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p class="lead">
                        Bitcoins behaves like a currency through its means of exchange and circulation,
                        however is not issued by, nor regulated by a government, which is a key point
                        of difference between Bitcoin and conventional currencies. Additionally,
                        Bitcoin’s intangible nature and changing value over time demonstrate its
                        similarities to an asset.
                        </p>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div id="" style="width:100%">
                            <canvas id="pie1"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div id="" style="width:100%">
                            <canvas id="pie2"></canvas>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-10 mx-auto">
                        <p class="lead">
                        As seen in the graphs above, majority of people consider Bitcoin to be an asset,
                         while a larger number of respondents elected that they would not invest in
                         Bitcoin. This is largely due its similarity to shares on the stock market
                         and issues of being “too volatile”, “untrustworthy” and “unstable”. Some
                         respondents made a point that these traits were mainly due to the fact that
                         Bitcoin is a relatively new technology and therefore unpredictable in its
                         future implementation.
                        <p>
                    </div>
                </div>

            </div>
          </div>
        </section> <!-- end Section 3: Asset vs Currency -->

        <!-- Section 4: Future of Bitcoin -->
        <section class="section_white ss-style-triangles" id="link4">
          <div class="padding">
              <div class="container">
                  <div class="d-flex justify-content-around">
                      <div class=""><h2>The Future of Bitcoin</h2></div>
                      <div class=""></div>
                      <div class="">
                          <a class="top-link-blue" href="#intro">Back to top</a>
                      </div>
                  </div>
                  <br><br>
                  <div class="col-10 mx-auto">
                      <p class="lead">Due to Bitcoin’s extreme volatility, it currently serves no
                        purpose as a currency. No one would purchase groceries with bitcoins if their
                        value could drastically rise tomorrow. Similarly, you wouldn’t accept a salary
                        of a particular amount of bitcoins because in a few weeks it could be worth
                        very little. </p>
                      <p class="lead">The truth is that Bitcoin will only reach a stable value once it
                        has fully grown and reached its capacity in terms of its worldwide implementation.
                        This is because Bitcoin’s value, much like the basic economic rule, is based on
                        supply and demand. Eventually, the Bitcoin supply will run out, leaving only the
                        demand to fluctuate. Once Bitcoin reaches maximum implementation, the demand will
                        become steady, leading to a stable Bitcoin price.</p>
                      <p class="lead">Respondents to the survey were asked why they would invest in Bitcoin.
                        The responses were categorised into the following categories:</p>
                      <ul class="lead">
                          <li>Future technology: people believe Bitcoin has great potential to become a worldwide currency.</li>
                          <li>Profit: people believe their investment could increase in value and earn them money.</li>
                          <li>Usefulness: people believe Bitcoin could be very useful and will eventually gain popularity. </li>
                      </ul>
                  </div>
                  <div class="mx-auto">
                      <div class="mx-auto" style="width:75%">
                          <canvas id="bar1"></canvas>
                      </div>
                  </div>
                  <br><hr><br>
                  <div class="col-10 mx-auto">
                      <h2>Concerns</h2>
                      <p class="lead">Because Bitcoin is such a new and emerging technology,
                        its evolving nature means that investors are often vulnerable to a
                        number or risks. These are mostly related to hacking and cyber-attacks
                        on vulnerable wallets. As such, precautions need to be taken by investors
                        to ensure their bitcoins are safe. Additionally, a large risk for investors
                        is a price crash due to Bitcoin’s volatile nature, this could cause investors
                        to potentially lose a large portion of their bitcoin value.</p>
                      <p class="lead">Another risk is called the ’51 percent attack’, and although
                        powerful, it is not easy to execute. In order mine more bitcoins, miners can
                        group together and share their computing power. If enough miners conjoin to
                        collectively command over 50% of the Bitcoin network, they could manipulate
                        transactions and use their group of miners to validate the transactions.
                        Because the attackers control more than 50% of the network, their misdeeds
                        are able to be authenticated. </p>
                      <p class="lead">Respondents to the survey were asked why people may be hesitant
                        to invest in Bitcoin. The responses were categorised into the following categories:</p>

                      <ul class="lead">
                          <li>Safety: people believed it was not a safe investment with the potential to lose their money.</li>
                          <li>Fluctuations: people believed the price of Bitcoin was too volatile to try and make any profit out of.</li>
                          <li>Price: people believed that an investment would be too expensive, causing significant consequences if they lost their investment.</li>
                          <li>Usefulness: people believed that Bitcoin has little potential and will not become a useful technology.</li>
                      </ul>
                  </div>
                  <div class="mx-auto">
                      <div class="mx-auto" style="width:75%">
                          <canvas id="bar2"></canvas>
                      </div>
                  </div>
              </div>
          </div>


        </section> <!-- end Section 4: Future of Bitcoin -->

        <!-- Begin Section 5: Conclusion -->
        <section class="section_blue " id="link5">
          <div class="padding">
              <div class="container">
                  <div class="d-flex justify-content-around">
                      <div class=""><h2>Conclusion</h2></div>
                      <div class=""></div>
                      <div class="">
                          <a class="top-link-white" href="#intro">Back to top</a>
                      </div>
                  </div>
                  <br><br>
                  <div class="col-12 mx-auto">
                      <p class="lead">As no clear correlation between Bitcoin price and
                        number of investors was found, the hypothesis could not be
                        confirmed. However, it was found that media attention and public
                        interest are closely related to the fluctuating prices of Bitcoin.
                        It was also found that money is the major influence on an individual’s
                         willingness to invest, this is supported by the main areas of
                         concern being related to security and the potential to lose money.
                         As such, these results suggest that the hypothesis may be supported,
                          as less people will be willing to invest if the price of Bitcoin
                          continues to rise.  </p>
                  </div>
              </div>
          </div>
        </section> <!-- end Section 5: Conclusion -->

        <div id="fixed"></div>



    <?php include 'templates/footer.php'; ?>
