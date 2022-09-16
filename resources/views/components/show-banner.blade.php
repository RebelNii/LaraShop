<style>
    #showBanner{
        background: thistle;
        padding: 30px;
    }

    #showBanner .showBanner{
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }

    .spanControl1{
        display: flex;
        justify-content: center;
    }

    .spanControl2{
        text-transform: uppercase;
        font-weight: 400;
        font-size: 17px;
    }

    @media(max-width: 768px){
        #showBanner{
            padding: 10px;
        }

        .spanControl2{
            font-size: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }
</style>


<div id="showBanner">
    <div class="showBanner">
        <div class="showShipping">
            <span class="material-symbols-sharp spanControl1">
                local_shipping
            </span><br>
            <span class="spanControl2">Three days <br> Delivery</span>
        </div>
        <div class="showReturn">
            <span class="material-symbols-sharp spanControl1">
                keyboard_return
            </span><br>
            <span class="spanControl2">10 days <br> return Policy</span>
        </div>
        <div class="showAid">
            <span class="material-symbols-sharp spanControl1">
                schedule
            </span><br>
            <span class="spanControl2">24/7 customer <br> support email </span>
        </div>
    </div>
</div>
