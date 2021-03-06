<div id="footer" class="mysoc-footer" role="contentinfo">
    <div class="row">

        <div class="medium-5 columns">
            <h2 class="mysoc-footer__site-name">TheyWorkForYou</h2>
            <div class="mysoc-footer__site-description">
                <p>Making it easy to keep an eye on the UK&rsquo;s parliaments. Discover who represents you, how they&rsquo;ve voted and what they&rsquo;ve said in debates &ndash; simply and clearly.</p>
            </div>
            <form method="post" class="footer__newsletter-form" action="//mysociety.us9.list-manage.com/subscribe/post?u=53d0d2026dea615ed488a8834&amp;id=287dc28511" onsubmit="trackFormSubmit(this, 'FooterNewsletterSignup', 'submit', null); return false;">
                <p>Get insights on TheyWorkForYou and other mySociety sites, in our popular newsletter</p>
                <div class="row collapse">
                    <div class="small-8 columns">
                        <input type="email" placeholder="Your email address" name="EMAIL"/>
                    </div>
                    <div class="small-4 columns">
                        <label style="position: absolute; left: -5000px;">
                          Leave this box empty: <input type="text" name="b_53d0d2026dea615ed488a8834_287dc28511" tabindex="-1" value="" />
                        </label>
                        <input type="hidden" name="group[11745][32]" value="1">
                        <input type="submit" value="Subscribe" name="subscribe" class="button prefix">
                    </div>
                </div>
                <p><a href="https://www.mysociety.org/privacy#newsletter">Your data</a></p>
            </form>
        </div>

        <div class="medium-4 columns">
            <nav class="mysoc-footer__links">
                <ul>
                  <?php foreach ($footer_links['about'] as $footer_link): ?>
                    <li role="presentation"><a href="<?= $footer_link['href'] ?>" title="<?= $footer_link['title'] ?>" class="<?= $footer_link['classes'] ?>"><?= $footer_link['text'] ?></a></li>
                  <?php endforeach; ?>
                </ul>
                <ul>
                  <?php foreach ($footer_links['tech'] as $footer_link): ?>
                    <li role="presentation"><a href="<?= $footer_link['href'] ?>" title="<?= $footer_link['title'] ?>" class="<?= $footer_link['classes'] ?>"><?= $footer_link['text'] ?></a></li>
                  <?php endforeach; ?>
                </ul>
            </nav>
        </div>

        <div class="medium-3 columns">
            <div class="mysoc-footer__donate">
                <p>Your donations keep this site and others like it running</p>
                <a href="https://www.mysociety.org/donate?utm_source=theyworkforyou.com&utm_content=footer+donate+now&utm_medium=link&utm_campaign=mysoc_footer" class="mysoc-footer__donate__button">Donate now</a>
            </div>
        </div>

    </div>
    <div class="row">

        <hr class="mysoc-footer__divider" role="presentation">

    </div>
    <div class="row">

        <div class="medium-5 columns">
            <div class="mysoc-footer__orgs">
                <p class="mysoc-footer__org">
                    Built by
                    <a href="https://www.mysociety.org?utm_source=theyworkforyou.com&utm_content=footer+logo&utm_medium=link&utm_campaign=mysoc_footer" class="mysoc-footer__org__logo mysoc-footer__org__logo--mysociety">mySociety</a>
                </p>
            </div>
        </div>

        <div class="medium-4 columns">
            <div class="mysoc-footer__legal">
                <p>mySociety Limited is a project of UK Citizens Online Democracy, a registered charity in England and Wales. For full details visit <a href="https://www.mysociety.org?utm_source=theyworkforyou.com&utm_content=footer+full+legal+details&utm_medium=link&utm_campaign=mysoc_footer">mysociety.org</a>.</p>
            </div>
        </div>

        <div class="medium-3 columns">
            <ul class="mysoc-footer__badges">
                <li role="presentation"><a href="https://github.com/mysociety/theyworkforyou" class="mysoc-footer__badge mysoc-footer__badge--github">Github</a></li>
                <li role="presentation"><a href="https://twitter.com/theyworkforyou" class="mysoc-footer__badge mysoc-footer__badge--twitter">Twitter</a></li>
                <li role="presentation"><a href="https://www.facebook.com/TheyWorkForYou" class="mysoc-footer__badge mysoc-footer__badge--facebook">Facebook</a></li>
            </ul>
        </div>

    </div>

    <?php

        // DAMN, this really shouldn't be in PAGE.
        $db = new ParlDB;
        $db->display_total_duration();

        $duration = getmicrotime() - STARTTIME;
        twfy_debug ("TIME", "Total time for page: $duration seconds.");
        if (!isset($_SERVER['WINDIR'])) {
            $rusage = getrusage();
            $duration = $rusage['ru_utime.tv_sec']*1000000 + $rusage['ru_utime.tv_usec'] - STARTTIMEU;
            twfy_debug ('TIME', "Total user time: $duration microseconds.");
            $duration = $rusage['ru_stime.tv_sec']*1000000 + $rusage['ru_stime.tv_usec'] - STARTTIMES;
            twfy_debug ('TIME', "Total system time: $duration microseconds.");
        }

?>

</div> <!-- end #footer -->
</div> <!-- end #container -->

<script src="/js/foundation/foundation.js"></script>
<script src="/js/foundation/foundation.magellan.js"></script>
<script src="/js/foundation/foundation.reveal.js"></script>
<script src="/js/riveted.min.js"></script>
<script src="/js/jquery.scrolldepth.min.js"></script>
<script src="/js/accessible-autocomplete.min.js"></script>

<script>

$('.autocomplete').each(function() {
  accessibleAutocomplete.enhanceSelectElement({
    selectElement: this,
    displayMenu: 'overlay',
    defaultValue: '',
    required: true
  });
});

  $( document ).ready(function() {

    $(".menu-dropdown").click(function(e) {
      var t = $(e.target);
      if ( ! t.hasClass('button') ) {
          t = t.parent('.button');
      }
      t.toggleClass('open');
      t.parent().next(".nav-menu").toggleClass('closed');
    });

    $.scrollDepth();

  });

  $(document).foundation();

  if (window.riveted) {
    riveted.init();
  }

  $(function() {
    setTimeout(function() {
      try {
        ga('send', 'event', 'engagement', 'timer', '7');
      } catch(err){}
    }, 7000);
  });

</script>
</body>
</html>
