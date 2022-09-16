<style>
    #adminCharts{
        margin-top: 2rem;
    }

    #adminCharts .adminCharts{
        display: flex;
        gap: 20px;
        justify-content: center;
    }

    #adminCharts .adminCharts #charts{
        width: 200px;
        height: 200px;
        border-radius: 100%;
        background: conic-gradient(
            pink 0deg 190deg,
            yellow 190deg 260deg,
            skyblue 260deg 360deg
        );
        position: relative;
    }

    #adminCharts .adminCharts #charts:nth-child(2){
        background: conic-gradient(
            #81A0C4 0deg 190deg,
            #5FB76E 190deg 260deg,
            #F7B76A 260deg 360deg
        );
    }

    #adminCharts .adminCharts #charts:nth-child(3){
        background: conic-gradient(
            #76F76A 0deg 190deg,
            #F7AAD1 190deg 260deg,
            #D6918B 260deg 360deg
        );
    }

    #adminCharts .adminCharts #charts #chart{
        width: 120px;
        height: 120px;
        border-radius: 100%;
        background: white;
        display: block;
        position: absolute;
        top: 40px;
        left: 40px;
    }

    #adminCharts .adminCharts #charts .chart{
        width: 20px;
        height: 20px;
        border-radius: 100%;
        background: white;
        display: block;
        position: absolute;
        top: 90px;
        left: 90px;
        font-size: 20px;
        cursor: pointer;
        text-decoration: none;
    }

    #adminCharts .adminCharts #charts:nth-child(1) .chart{
        transform: translateX(-20px);
    }

    @media(max-width: 1000px){
        #adminCharts .adminCharts #charts{
            width: 160px;
            height: 160px;
        }

        #adminCharts .adminCharts #charts #chart{
            top: 20px;
            left: 20px;
        }

        #adminCharts .adminCharts #charts .chart{
            top: 70px;
            left: 70px;
        }
    }

    @media(max-width: 478px){
        #adminCharts{
            display: none;
        }
    }

    
</style>

@props(['users', 'products','checkouts'])

<div id="adminCharts">
    <div class="adminCharts">
        <div id="charts">
            <span id="chart"></span>
            <abbr class="chart" title="Amount of sales">${{$checkouts->sum('order_price')}}</abbr>
        </div>
        <div id="charts">
            <span id="chart"></span>
            <abbr class="chart" title="Number of Products">{{$products->count('id')}}</abbr>
        </div>
        <div id="charts">
            <span id="chart"></span>
            <abbr class="chart" title="Number of Customers">{{$users->count('id')}}</abbr>
        </div>
    </div>
</div>