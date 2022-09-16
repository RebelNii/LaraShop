<style>
#adminNav{
    height: 100%;
    background: rgb(224, 229, 227);
    margin-top: 2rem;
    border-radius: 7px;
}

#adminNav .adminNav{}

#adminNav .adminNav .adminNav-top{
    display: flex;
    justify-content: end;
    cursor: pointer;
    background: rgb(224, 189, 161);
    padding: 10px;
    display: none;
}

#adminNav .adminNav .routes{
    padding: 20px 30px;
}

#adminNav .adminNav .routes a{
    display: flex;
    gap: 50px;
    align-items: center;
    text-decoration: none;
    margin-bottom: 1.4rem;
    color: #363636;
    background: rgb(145, 216, 204);
    border-radius: 4px; 
    padding: 10px;
    transition: all 3ms ease;
    cursor: pointer;
}

#adminNav .adminNav .routes a h4{
    font-size: 18px;
    font-weight: 500;
}

@media(max-width: 1000px){
    #adminNav .adminNav .routes a{
        
    }

    #adminNav .adminNav .routes a span{
        display: none;
    }
}

@media(max-width: 768px){
    #adminNav .adminNav .routes a h4{
        display: none;
    }

    #adminNav .adminNav .routes a span{
        display: block;
    }

    #adminNav .adminNav .adminNav-top{
        display: block;
    }

    #adminNav{
        position: fixed;
        z-index: 3;
        display: none;
        left: -100%;
        animation: showMenu 400ms ease forwards;
    }

    @keyframes showMenu {
        to{
            left:0
        }
    }
}



</style>


<div id="adminNav">
    <div class="adminNav">
        <div class="adminNav-top">
            <span class="material-symbols-sharp">close</span>
        </div>
        <div class="routes">
            <a href="/admin">
                <span class="material-symbols-sharp">
                    house
                </span>
                <h4>OverView</h4>
            </a>
            <a href="/admin/products">
                <span class="material-symbols-sharp">
                    grid_view
                </span>
                <h4>Products</h4>
            </a>
            <a href="/admin/add">
                <span class="material-symbols-sharp">
                    add
                </span>
                <h4>Add Product</h4>
            </a>
            <a href="/admin/users">
                <span class="material-symbols-sharp">
                    person
                </span>
                <h4>Users</h4>
            </a>
            <a href="">
                <span class="material-symbols-sharp">
                    reorder
                </span>
                <h4>Cart</h4>
            </a>
            <a href="">
                <span class="material-symbols-sharp">
                    done_all
                </span>
                <h4>CheckOuts</h4>
            </a>
            <a href="">
                <span class="material-symbols-sharp">
                    grid_view
                </span>
                <h4>Reports</h4>
            </a>
            <a href="/">
                <span class="material-symbols-sharp">
                    store
                </span>
                <h4>Store</h4>
            </a>
            <a href="/logout">
                <span class="material-symbols-sharp">
                    logout
                </span>
                <h4>Logout</h4>
            </a>
        </div>
    </div>
</div>