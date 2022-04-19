<% with $GetRootPage($init) %>
  <% if $SocialFacebook %>
    <a href="$SocialFacebook" class="footer__sociallinkindex facebook"></a>
  <% end_if %>
  <% if $SocialYoutube %>
    <a href="$SocialYoutube" class="footer__sociallinkindex youtube"></a>
  <% end_if %>
  <% if $SocialInstagram %>
    <a href="$SocialInstagram" class="footer__sociallinkindex instagram"></a>
  <% end_if %>
  <% if $SocialLinkedIn %>
    <a href="$SocialLinkedIn" class="footer__sociallinkindex linkedin"></a>
  <% end_if %>
<% end_with %>