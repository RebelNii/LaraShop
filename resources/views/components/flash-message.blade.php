<style>
  .fixed{
      top: 0;
      padding: 3px 48px;
      color: #000;
      background: lightgreen;
      transition: .5s ease-in-out;
      position: relative;
  }

  .p{
      text-align: center;
      text-transform: uppercase;
      padding: 10px;
  }
</style>


@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show"
class="fixed ">
    <p class="p">{{session('message')}}</p>
</div>
@endif