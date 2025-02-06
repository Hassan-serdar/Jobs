<h1>
    {{$job->title}}
</h1>
<p>
Finally! Your job is now live on our website. 
</p>

<p>
    <a href="{{url('/jobs/'.$job->id)}}">View Your Job</a>
</p>