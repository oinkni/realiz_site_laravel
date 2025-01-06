@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- 
$totalMembersQuery = "SELECT COUNT(*) as total FROM members";
$totalMembersStmt = $db->prepare($totalMembersQuery);
$totalMembersStmt->execute();
$totalMembers = $totalMembersStmt->fetch(PDO::FETCH_ASSOC)['total'];


$professionDistributionQuery = "SELECT profession, COUNT(*) as count FROM members GROUP BY profession";
$professionDistributionStmt = $db->prepare($professionDistributionQuery);
$professionDistributionStmt->execute();
$professionDistribution = $professionDistributionStmt->fetchAll(PDO::FETCH_ASSOC);
?>-->
<!-- 
<h2>Dashboard</h2>
<div>
    <h3>Total Members: <?php echo $totalMembers; ?></h3>
    <h3>Profession Distribution:</h3>
    <ul>
        <?php foreach ($professionDistribution as $profession): ?>
            <li><?php echo htmlspecialchars($profession['profession']); ?>: <?php echo $profession['count']; ?></li>
        <?php endforeach; ?>
    </ul>
</div> -->