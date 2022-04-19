<% if $Link %>
  <a href="$Link.URL" target="_blank">
    <img class="homepage__sponsors-img" src="$Image.URL" alt="sponsorimage">
  </a>
<% else %>
  <img class="homepage__sponsors-img" src="$Image.URL" alt="sponsorimage">
<% end_if %>