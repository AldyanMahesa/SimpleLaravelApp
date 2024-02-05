<div class="card m-3" style="width: 18rem; height:27rem; padding-right: 0">
    <div class="card-header" style="height: 9rem; overflow:hidden">
        <div style="height: 5rem; overflow:hidden">
            
        <h6 class="card-title" id="mTitle{{ $i }}"> </h6>
        <p class="card-subtitle mb-2 text-muted" id="mProductionCompany{{ $i }}"></p>
        </div>
        <div class="clearfix">
            <span class="float-start rounded-end text-white bg-secondary" id="mReleaseDate{{ $i }}"></span>
            <span class="float-end rounded-start text-white bg-secondary" id="mDuration{{ $i }}"></span>
        </div>
    </div>
    <div class="card-body">
        <p class="card-text" style="height: 8rem; overflow:auto;" id="mOverview{{ $i }}"></p>

        <p id="mBudget{{ $i }}"></p>
        <p style="text-align:justify; overflow:hidden; text-overflow:ellipsis; width:100%; height:2rem;">homepage:<a
                id="mHomepage{{ $i }}" href=""></a>
            </p>
    </div>
    <div class="card-footer">
        <div class="clearfix">
            <span class="float-start rounded-end bg-warning" id="mRating{{ $i }}"> </span>
            <span class="float-end rounded-start bg-warning" id="mPopularity{{ $i }}"></span>
        </div>
    </div>
</div>

