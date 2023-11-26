@if ($paginator->lastPage() > 1)
    <div class="pagination">

        <ul class="btn-group">
            @php
                $link_limit = 12;
            @endphp
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <?php
                $half_total_links = floor($link_limit / 2);
                $from = $paginator->currentPage() - $half_total_links;
                $to = $paginator->currentPage() + $half_total_links;
                if ($paginator->currentPage() < $half_total_links) {
                    $to += $half_total_links - $paginator->currentPage();
                }
                if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                    $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                }
                ?>
                @if ($from < $i && $i < $to)
                    <li class=" {{ $paginator->currentPage() == $i ? 'active' : '' }} ">
                        <a class=" pagin"
                            href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor


            </li>
        </ul>

    </div>
@endif
