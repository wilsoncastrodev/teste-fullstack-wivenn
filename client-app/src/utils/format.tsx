import dayjs from 'dayjs';
import 'dayjs/locale/pt-br';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);
dayjs.locale('pt-br');

export const formatDistanceToNow = (date: string) => {
    const dataConvertida = dayjs(date);

    return dataConvertida.fromNow();
}
