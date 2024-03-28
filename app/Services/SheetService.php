<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Services;

use App\Criteria\SheetPerStoreCriteria;
use App\Repositories\SheetRepository;
use Exception;
use Illuminate\Pagination\CursorPaginator;
use YouCan\Models\Session;
use YouCan\Services\CurrentAuthSession;

class SheetService
{
    /**
     * @throws Exception
     */
    public function __construct(
        protected Session         $session,
        protected SheetRepository $sheetRepository
    )
    {
        $this->session = CurrentAuthSession::getCurrentSession();
    }

    public function getAll(): CursorPaginator
    {
        return $this->sheetRepository->pushCriteria(app(SheetPerStoreCriteria::class, [
            'store_id' => $this->session->getStoreId(),
        ]))->cursorPaginate();

    }
}
