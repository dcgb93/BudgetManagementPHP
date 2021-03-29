<!-- <div class="jumbotron">
        <div class="container">
            <h1>Housing Budget</h1>
        </div>
    </div> -->
    <div class="container" ng-app="app" ng-controller='main' style="background-color: rgba(27, 27, 50, 0.8);
    color: white;">
        <h4>Total Budget: <input type="text" ng-model='total' /></h4>
        <hr />
        <table class="table table-striped" style="color:white; background-color:transparent;">
            <thead>
                <tr>
                    <th>Room</th>
                    <th>Budget</th>
                    <th>Percentage of Budget</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody >
                <tr ng-repeat="room in rooms track by $index" style="color:white; background-color:transparent;" >
                    <th scope="row" style="color:white; background-color:transparent;">Room Name</th>
                    <td class="price" style="color:white; background-color:transparent;"><input class="form-control" type="text" ng-model="room.budget" /></td>
                    <td style="color:white; background-color:transparent;">
                        <!-- (room.budget / total * 100) | number:2% -->
                    </td>
                    <td style="color:white; background-color:transparent;"><button ng-click="delete($index)" class="btn btn-danger">Delete</button></td>
                </tr>
                <tr>
                    <th scope="row">Remaining Budget</th>
                    <td class="total">test</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <h3>Add Room</h3>
        <div class="row">
            <div class="col-xs-4">
                <input type="text" class="form-control" ng-model="addRoom" placeholder="Room title" />
            </div>
            <div class="col-xs-4">
                <input type="text" class="form-control" ng-model="addBudget" placeholder="Room budget" />
            </div>
            <button ng-click="add()" class="btn btn-success col-xs-3">Add Room</button>
        </div>
        <hr />

    </div>

    <br />


    <style>
      .jumbotron {
        background-color: rgba(27, 27, 50, 0.8);
        color: white;
    }
    </style>