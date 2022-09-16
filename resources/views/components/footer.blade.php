

<style>
    #footer{
        margin-top: 2rem;
    }
    
    #footer .footer{
        position: relative;
    }

    #footer .footer{
        background: rgb(182, 194, 198, .4);
        padding: 20px;
    }

    #footer .footer .footerMail{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #footer .footer .footerMail form h6{
        font-weight: 600;
        font-size: 18px;
        text-transform: uppercase;
    }

    #footer .footer .footerMail form .mailing input{
        padding: 5px;
        border-radius: 5px;
        outline: none;
        width: 100%;
    }

    #footer .footer .footerMail form .footerBtn button{
        margin-top: .5rem;
        margin-bottom: .5rem;
        padding: 5px;
        outline: none;
        border: none;
        border-radius: 5px;
        background: teal;
        width: 98%;
    }

    #footer .footer .footerLinks{
        background: rgb(221, 220, 148,.6);
        border-radius: 7px;
        box-shadow: 3px 3px 3px rgb(221, 220, 148);
        display: grid;
        grid-template-columns: repeat(4,1fr);
        place-items: center;
        padding: 10px;
    }

    #footer .footer .footerLinks h5{
        font-weight: 600;
        font-size: 18px;
        text-shadow: 1px 1px 1px #333;
    }

    #footer .footer .footerLinks span{
        font-weight: 400;
        font-size: 15px;
    }

    #footer .footer .fotbtnContain .fotbtn{
        position: fixed;
        bottom: 10%;
        right: 4%;
        width: 50px;
        height: 50px;
        outline: none;
        border: none;
        background: rgb(151, 221, 148);
        cursor: pointer;
        z-index: 3;
    }

    @media(max-width: 768px){
        #footer .footer .footerLinks{
            grid-template-columns: 1fr;
        }

        #footer .footer .fotbtnContain .fotbtn{
            right: 7%;
            bottom: 7%;
        }
    }

</style>

<div id="footer">
    <div class="footer">
        <div class="footerMail">
            <form action="">
                @csrf
                <h6>Join our Mailing List</h6> <br>
                <div class="mailing">
                    <input type="text" name="mail" placeholder="Mail">
                </div>
                <div class="footerBtn">
                    <button>Subscribe</button>
                </div>
            </form>
        </div>
        <div class="footerLinks">
            <div class="storeHours">
                <h5>Store Hours</h5><br>
                <span>Mon - Fri: 9am to 9pm</span><br>
                <span>Saturday: 10am to 7pm</span><br>
                <span>Sunday: 12am to 5pm</span><br>
            </div>
            <div class="storeLocation">
                <h5>Store Locations</h5> <br>
                <span>Adenta</span><br>
                <span>East Legon</span><br>
                <span>Madina</span>
            </div>
            <div class="storeHelp">
                <h5>Need Help?</h5> <br>
                <span>Contact Us</span> <br>
                <span>Report</span> <br>
                <span>Review</span>
            </div>
            <div class="storeConnect">
                <h5>Follow Us</h5> 
                <span><i class="fa-brands fa-facebook-f"></i>: Projects</span><br>
                <span><i class="fa-brands fa-twitter"></i>: @Projects</span><br>
                <span><i class="fa-brands fa-square-instagram"></i>: Projects</span><br>
                <span><i class="fa-brands fa-tiktok"></i>:Projects</span>
            </div>
        </div>
        <div class="fotbtnContain">
            <button class="fotbtn top-btn" id="fotbtn"><span class="material-symbols-sharp">
                expand_less
                </span></button>
        </div>
    </div>
</div>