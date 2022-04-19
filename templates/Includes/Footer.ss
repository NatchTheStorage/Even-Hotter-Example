<footer class="footer">
  <div class="footer__wrapper">
    <div class="footer__brand"></div>
    <div class="footer__lower">

      <div class="footer__uppergroup">
        <div class="footer__sociallinks desktop">
          <% include FooterSocials %>
        </div>

        <ul class="footer__links">
          <% loop $Menu(2) %>
            <% if $AddToFooter %>
              <li class="footer__link">
                <a href="{$Link}">$Title</a>
              </li>
            <% end_if %>
          <% end_loop %>
          <% loop $Menu(1) %>
            <% if $AddToFooter %>
              <li class="footer__link">
                <a href="{$Link}">$Title</a>
              </li>
            <% end_if %>
          <% end_loop %>
        </ul>

        <a href="#" class="footer__backtotop">
          Back to top
          <div class="footer__backtotop-arrow"></div>
        </a>

        <div class="footer__info">
          <% include FooterContacts %>
        </div>

        <div class="footer__bottom">
          <a class="footer__bsc" href="https://blacksheepcreative.co.nz" target="_blank"> Website by Black Sheep
            Creative</a>
          <div class="footer__sociallinks mobiletablet">
            <% include FooterSocials %>
          </div>
        </div>
      </div>
    </div>
</footer>