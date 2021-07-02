
<!-- Filter Row -->
<div class="filter-row">
          <div class="row">
            <div class="items-count"><span id="catItemCount">{{$itemCount}}</span> item(s)</div>
            <div class="select-wrap d-none d-md-flex">
              <div class="select-label">SORT:</div>
              <div class="select-wrapper select-wrapper-xxs">
                <select class="form-control input-sm" id="categoryProductSortBy">
                  <option selected value="latest">New Arrivals</option>
                  <option value="LTH">Price: low to heigh</option>
                  <option value="HTL">Price: heigh to low</option>
                </select>
              </div>
            </div>
            <div class="select-wrap d-none d-md-flex">
              <div class="select-label">VIEW:</div>
              <div class="select-wrapper select-wrapper-xxs">
                <select class="form-control input-sm" id="inventorylimit">
                  <option value="4">4</option>
                  <option value="10">10</option>
                  <option value="50">50</option>
                </select>
              </div>
            </div>
            <div class="viewmode-wrap">
              <div class="view-mode">
                <span class="js-horview d-none d-lg-inline-flex"><i class="icon-grid"></i></span>
                <span class="js-gridview"><i class="icon-grid"></i></span>
                <span class="js-listview"><i class="icon-list"></i></span>
              </div>
            </div>
          </div>
</div>
<!-- /Filter Row -->