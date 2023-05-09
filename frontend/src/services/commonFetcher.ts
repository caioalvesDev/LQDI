import axios from 'axios'

interface IOptions<T=any> {
    onError?: (error: any) => void;
    onLoading?: (loading: boolean) => void;
    OnSucess?: (data: T) => void;
  }



  export async function commonFetcher<T>(url: string, method: "get" | "delete" = "get", options?: IOptions<T>) {
    try {
        options?.onLoading?.(true)
        const result = await axios[method](url)
        options?.OnSucess?.(result.data)
    } catch (error) {
        options?.onError?.(error)
    }finally{
        options?.onLoading?.(false)
    }
  }