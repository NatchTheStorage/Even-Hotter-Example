<% include Header %>
<% include PageBanner %>

<div class="page__eventsholder">
  <form class="eventsholder__filter">
    <div class="eventsholder__filter-inner">
      <h2 class="eventsholder__filter-title">Event Calendar</h2>

      <div class="eventsholder__filter-unit">

        <label for="eventslocation">Location: </label>
        <select name="location" id="eventslocation">

          <option disabled selected value="">Select a location</option>
          <option value="">All</option>
          <% loop $Locations($init) %>
            <option value="$Title">$Title</option>
          <% end_loop %>
        </select>
      </div>

      <div class="eventsholder__filter-unit">

        <label for="eventsdate">Date: </label>
        <select name="date" id="eventsdate">

          <option disabled selected value="">Select a date</option>
          <option value="">All</option>
          <% loop $Dates($init) %>
            <option value="$Value">$Title</option>
          <% end_loop %>
        </select>
      </div>

      <button class="eventsholder__filter-button">Apply Filter</button>
    </div>


    <div class="eventsholder__events">
      <% if $UpcomingEvents($init) %>
        <div class="eventsholder__events-list">
          <% loop $UpcomingEvents($init) %>
            <% include CardEvent %>
          <% end_loop %>
        </div>
        <% include PaginationNavigator Paginate=$UpcomingEvents($init) %>
      <% else %>
        <h3>Oh no, your search did not return any results!</h3>
      <% end_if %>
    </div>
  </form>
</div>

<%--$NewsletterForm--%>
<% include Footer %>
<% include FloatingDonate %>
