<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('actions', function ($id) {
                return 
                    '<a class="btn btn-info" href="' . route('m_user.show', $id->user_id) . '">Show</a> '.
                    '<a class="btn btn-primary" href="' . route('m_user.edit', $id->user_id) . '">Ubah</a> '.
                    '<form action="' . route('m_user.destroy', $id->user_id) . '" method="POST" style="display:inline">' .
                        csrf_field() .
                        method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger">Delete</button>' .
                    '</form>';
;
            })
            ->rawColumns(['actions'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(UserModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('user_id')->width('5%'),
            Column::make('level_id')->width('5%'),
            Column::make('username'),
            Column::make('nama'),
            // Column::make('password'),
            Column::make('created_at')->width('10%'),
            Column::make('updated_at')->width('10%'),
            Column::computed('actions')
                  ->exportable(false)
                  ->printable(false)
                  ->width(300)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
