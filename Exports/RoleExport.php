<?php

namespace Modules\Rbac\Exports;

use Box\Spout\Common\Exception\InvalidArgumentException;
use Modules\Core\Abstracts\Export\FastExcelExport;
use Modules\Rbac\Models\Role;

class RoleExport extends FastExcelExport
{
    /**
     * @param null $data
     * @throws InvalidArgumentException
     */
    public function __construct($data = null)
    {
        parent::__construct();

        $this->data($data);
    }

    /**
     * @param Role $row
     * @return array
     */
    public function map($row): array
    {
        $this->formatRow = [
            '#' => $row->id,
            'Display Name' => $row->name,
            'Guard' => ucfirst($row->guard_name),
            'Remarks' => $row->remarks,
            'Enabled' => ucfirst($row->enabled),
            'Created' => $row->created_at->format(config('app.datetime')),
            'Updated' => $row->updated_at->format(config('app.datetime'))
        ];

        $this->getSupperAdminColumns($row);

        return $this->formatRow;
    }
}
